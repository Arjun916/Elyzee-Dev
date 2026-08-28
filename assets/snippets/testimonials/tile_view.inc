<div class="col-lg-4 col-md-6">
    <!-- Testimonial Item Start -->
    <div class="testimonial-item wow fadeInUp">
        <div class="testimonial-item-content">
            <p><cms:get "short_desc_<cms:show k_lang />" /></p>
        </div>
        <div class="testimonial-author">
            <div class="author-image">
                <figure class="image-anime">
                    <img class="lazy" src="<cms:show px_img/>" data-src="<cms:if page_image><cms:show page_image/><cms:else/><cms:show k_site_link/>assets/images/testimonials/author<cms:show gender/>.jpg</cms:if>" alt='<cms:get "title_<cms:show k_lang />" />'>
                </figure>
            </div>            
            <div class="author-content">
                <h3><cms:get "title_<cms:show k_lang />" /></h3>
                <p><cms:get "heading_<cms:show k_lang />" /></p>
            </div>
        </div>                                    
    </div>
    <!-- Testimonial Item End -->
</div>