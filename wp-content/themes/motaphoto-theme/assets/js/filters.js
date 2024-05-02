// FILTERS

function initializeFilters() {
    let activeCategorie = 'all';
    let activeFormat = 'all';
    let activeSortByDate = 'all';

    jQuery('#categories').val(activeCategorie);
    jQuery('#formats').val(activeFormat);
    jQuery('#sort-by-date').val(activeSortByDate);

    function areFiltersActive() {
        return activeCategorie !== 'all' || activeFormat !== 'all' || activeSortByDate !== 'all';
    }

    // Event handler for filter changes
    jQuery('#categories, #formats, #sort-by-date').on('change', function() {
        ajaxFilter();
    });

    function ajaxFilter() {
        let categorie = jQuery('#categories').val();
        let format = jQuery('#formats').val();
        let sortByDate = jQuery('#sort-by-date').val();

        // Update active filter states
        activeCategorie = categorie;
        activeFormat = format;
        activeSortByDate = sortByDate;

        // Hide the "Load More" button if filters are active
        if (areFiltersActive()) {
            jQuery('#load-more').hide();
        }

        jQuery.ajax({
            type: 'POST',
            url: './wp-admin/admin-ajax.php',
            data: {
                action: 'ajaxFilter',
                categorie: categorie,
                format: format,
                sortByDate: sortByDate
            },
            success: function(response) {
                jQuery('.galerie__photos').html(response);

                // Show the "Load More" button if no filters are active
            }
        });
    }
}