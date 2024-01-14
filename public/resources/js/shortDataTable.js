    $('.dataTable').fancyTable({
        sortColumn: 0, // column number for initial sorting
        sortOrder: 'descending', // 'desc', 'descending', 'asc', 'ascending', -1 (descending) and 1 (ascending)
        sortable: true,
        pagination: true, // default: false
        perPage: 10, //Elementos por página
        searchable: true, //si queremos que sea buscable
        globalSearch: true, //búsqueda global
        globalSearchExcludeColumns: [0],// excluir columnas
    
        //Customizar la paginación
        paginationClass: "pagButton",
        paginationClassActive: 'pagButtonActive',
    
        //Customizar el search
        inputStyle: "background-color:var(--color-body);color:white;font-family: var(--fuente-pagina);outline:none;padding:0.45em; border:unset;",
        inputPlaceholder: 'Buscar...',
    
    });



//https://www.jqueryscript.net/table/sorting-filtering-pagination-fancytable.html