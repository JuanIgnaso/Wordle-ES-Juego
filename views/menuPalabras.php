<?php
use juanignaso\phpmvc\Application;
use juanignaso\phpmvc\form\Form;

/**
 * @var $this \juanignaso\phpmvc\View
 */

$this->title = 'Menú Palabras';
?>
<ol class="confMenu">
    <li><span>Palabras</span></li>
    <li>/</li>
    <li><a href="/menuCategorias">Categorías</a></li>
</ol>
<h1 class="tituloPagina">Menú de Palabras</h1>
<main>
    <?php $form = Form::begin('', 'post'); ?>
    <div class="actions">
        <div class="custom-select" style="width:200px;">
            <select name="categoria" id="selectCategoria">
                <option value="">Selecciona Una</option>
                <?php
                foreach ($categorias as $categoria) {
                    ?>
                    <option value="<?php echo $categoria['id']; ?>">
                        <?php echo $categoria['nombre_categoria']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>

        </div>
        <p class="input_error">
            <?php if (isset($errors['categoria'])) {
                echo ($errors['categoria'][0]);
            } ?>
        </p>
        <!-- script custom select -->
        <script>
            var x, i, j, l, ll, selElmnt, a, b, c;
            /* Look for any elements with the class "custom-select": */
            x = document.getElementsByClassName("custom-select");
            l = x.length;
            for (i = 0; i < l; i++) {
                selElmnt = x[i].getElementsByTagName("select")[0];
                ll = selElmnt.length;
                /* For each element, create a new DIV that will act as the selected item: */
                a = document.createElement("DIV");
                a.setAttribute("class", "select-selected");
                a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                x[i].appendChild(a);
                /* For each element, create a new DIV that will contain the option list: */
                b = document.createElement("DIV");
                b.setAttribute("class", "select-items select-hide");
                for (j = 1; j < ll; j++) {
                    /* For each option in the original select element,
                    create a new DIV that will act as an option item: */
                    c = document.createElement("DIV");
                    c.innerHTML = selElmnt.options[j].innerHTML;
                    c.addEventListener("click", function (e) {
                        /* When an item is clicked, update the original select box,
                        and the selected item: */
                        var y, i, k, s, h, sl, yl;
                        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                        sl = s.length;
                        h = this.parentNode.previousSibling;
                        for (i = 0; i < sl; i++) {
                            if (s.options[i].innerHTML == this.innerHTML) {
                                s.selectedIndex = i;
                                h.innerHTML = this.innerHTML;
                                y = this.parentNode.getElementsByClassName("same-as-selected");
                                yl = y.length;
                                for (k = 0; k < yl; k++) {
                                    y[k].removeAttribute("class");
                                }
                                this.setAttribute("class", "same-as-selected");
                                break;
                            }
                        }
                        h.click();
                    });
                    b.appendChild(c);
                }
                x[i].appendChild(b);
                a.addEventListener("click", function (e) {
                    /* When the select box is clicked, close any other select boxes,
                    and open/close the current select box: */
                    e.stopPropagation();
                    closeAllSelect(this);
                    this.nextSibling.classList.toggle("select-hide");
                    this.classList.toggle("select-arrow-active");
                });
            }

            function closeAllSelect(elmnt) {
                /* A function that will close all select boxes in the document,
                except the current select box: */
                var x, y, i, xl, yl, arrNo = [];
                x = document.getElementsByClassName("select-items");
                y = document.getElementsByClassName("select-selected");
                xl = x.length;
                yl = y.length;
                for (i = 0; i < yl; i++) {
                    if (elmnt == y[i]) {
                        arrNo.push(i)
                    } else {
                        y[i].classList.remove("select-arrow-active");
                    }
                }
                for (i = 0; i < xl; i++) {
                    if (arrNo.indexOf(i)) {
                        x[i].classList.add("select-hide");
                    }
                }
            }

            /* If the user clicks anywhere outside the select box,
            then close all select boxes: */
            document.addEventListener("click", closeAllSelect); 
        </script>



        <?php echo $form->field($model, 'palabra'); ?>
        <button type="submit" class="botonActions botonAdd">Añadir Palabra</button>
    </div>

    <?php Form::end(); ?>
    <section class="registrosContainer">
        <div class="separator"></div>
        <table class="dataTable">
            <caption>Palabras Actuales</caption>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Palabra</th>
                <th scope="col">Categoria</th>
                <th scope="col">Acción</th>
            </tr>
            <?php
            foreach ($palabras as $palabra) {
                ?>
                <tr>
                    <td>
                        <?php echo $palabra['id']; ?>
                    </td>
                    <td>
                        <?php echo $palabra['palabra']; ?>
                    </td>
                    <td>
                        <?php echo $palabra['nombre_categoria']; ?>
                    </td>
                    <td class="action">
                        <i class="fa-regular fa-square-minus actionBorrar" aria-label="Borrar"></i>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <div class="separator" style="margin-bottom: 2em;"></div>
    </section>
</main>