// OPEN LIGHTBOX
function initializeLightbox() {
    jQuery(document).on('click', '.fadedbox__fullscreen', function() {
        openLightbox(jQuery(this).closest('.galerie__photos--single'));
        
    });

    const lightbox = jQuery(".lightbox");
    const closeIcon = jQuery(".lightbox__close");
    const prevButton = jQuery(".lightbox__prev");
    const nextButton = jQuery(".lightbox__next");

    let currentIndex = 0; // Track the index of the currently displayed photo

    closeIcon.click(closeLightbox);
    prevButton.click(showPreviousPhoto);
    nextButton.click(showNextPhoto);

    function openLightbox(photo) {
        const photoSrc = photo.data('photo-src');
        const photoRef = photo.data('photo-ref');
        const photoCategorie = photo.data('photo-categorie');

        jQuery('.lightbox__image').attr('src', photoSrc);
        jQuery('.lightbox__ref').text(photoRef);
        jQuery('.lightbox__cat').text(photoCategorie);

        // Update the current index to the index of the clicked photo
        currentIndex = jQuery(".galerie__photos--single").index(photo);

        lightbox.addClass("active");
    }

    function closeLightbox() {
        lightbox.removeClass("active");
    }
        // 
        
    function showPreviousPhoto() {
        // Update the index to the previous photo
        currentIndex = (currentIndex - 1 + jQuery(".galerie__photos--single").length) % jQuery(".galerie__photos--single").length;

        // Get the photo at the updated index
        const prevPhoto = jQuery(".galerie__photos--single").eq(currentIndex);

        // Display the information of the previous photo
        openLightbox(prevPhoto);
    }

    function showNextPhoto() {
        // Update the index to the next photo
        currentIndex = (currentIndex + 1) % jQuery(".galerie__photos--single").length;

        // Get the photo at the updated index
        const nextPhoto = jQuery(".galerie__photos--single").eq(currentIndex);

        // Display the information of the next photo
        openLightbox(nextPhoto);
    }

    function keyPress(e){
        // Show Previous Photo on Left arrow key
        
        if (e.keyCode === 37 ){
            showPreviousPhoto();
            // Show Next Photo on Right arrow key
        } else if(e.keyCode === 39 ){
            showNextPhoto();
        // Close lightbox on Escape key
        } else if(e.keyCode === 27){
            closeLightbox();
        }
    }
    document.addEventListener('keydown', keyPress)
}