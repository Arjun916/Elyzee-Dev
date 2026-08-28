<cms:capture into="has_doctor_related_insights">
<cms:reverse_related_pages 'doctors' masterpage='insights.php' page_id=k_page_id>
<cms:embed "insights/tile_view.inc"/>
<cms:set has_doctor_related_insights = '1' 'global'/>
</cms:reverse_related_pages>
</cms:capture>

<cms:if has_doctor_related_insights>
<section class="border-top-accent-5 bg-light bg_asthetic_treatments">
    <div class="container">
		<div class="section-title mt-5 mb-3 p-0">
			<h3 class="wow fadeInUp small"><a href="<cms:link 'insights.php'/>" class=" m-0 p-0 text-black"><cms:call 'get_page_title' tname='insights.php'/></a></h3>
        </div>
		
		<div class="block-carousel px-1 mx-3" data-slidesToShow='3' data-slidesLoop='false'><cms:show has_doctor_related_insights/></div>
    </div>
</section>
</cms:if>
