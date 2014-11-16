<?php if ($teaser): ?><!-- teaser weergave op de pagina overzicht tractors en auto's zelfde inhoudstype met een extra veld(tractor/auto - vinkje)-->
<div class="wrapper_aanbod_teaser">
    <?php  // print_r ($field_machine_verkocht)  ?><!-- dit om te testen-->
    <?php  // print_r ($field_machine_reserved) ?><!-- dit om te testen-->
    <?php   // print_r ($field_machine_promo ?: [1, 2]) ?><!-- dit om te testen-->
    <?php  //  print_r ($field_nieuw_binnen) ?><!-- dit om te testen-->
	<div class="aanbod_machine">

		<?php if ($field_machine_verkocht["und"][0]["value"]==="ja"): ?><!-- indien machine verkocht toon de banner verkocht -->
        	<div class="sold"></div><?php print render($content['field_machine_img'][0]); ?>

       	<?php elseif ($field_machine_reserved["und"][0]["value"]==="ja"): ?><!-- indien machine gereserveerd toon de banner gereserveerd -->
        	<div class="reserved"></div><?php print render($content['field_machine_img'][0]); ?>

        <?php elseif (count($field_machine_promo) && $field_machine_promo["und"][0]["value"]==="ja"): ?><!-- toon de banner promo om een of andere duistere rede moet ik hier het field gaan tellen naar inhoud - foutcode (Notice: Undefined index: und in include() (line 12 of/ home/acmachines/ domains/acmachines-minitractors.be/ public_html/sites/all/themes/skeletontheme/ templates/ node--machines.tpl.php).( -->
        	<div class="promo"></div><?php print render($content['field_machine_img'][0]); ?>

        <?php elseif (isset($field_nieuw_binnen["und"][0]["value"]) && $field_nieuw_binnen["und"][0]["value"]==="nieuw"): ?><!-- indien machine nieuw toon de banner gereserveerd -->
            <div class="nieuw"></div><?php print render($content['field_machine_img'][0]); ?>

		<?php else: ?>

    		<?php print render($content['field_machine_img'][0]); ?>  <!-- niet verkocht, niet gereserveerd, niet nieuw en geen promo toon het eerste beeld van de machine zonder banner-->
    	<?php endif; ?>
        <div class="title_mach_teaser"><?php print $title; ?></div>
        <?php print render($content['field_soort_machine']); ?>
        <?php print render($content['field_vermogen']); ?>
        <?php print render($content['field_prijs']); ?>
        <?php print render($content['field_prijs_marge']); ?>
        <?php if ($field_prijs_aanvraag): ?><strong>Prijs:</strong><br />Op aanvraag <?php endif; ?>
        <div class="more_info_teaser"><a href="<?php print $node_url; ?>">Meer informatie >></a></div> <!-- een meer info link naar de volledige node -->
        <div class="youtube_logo"><!-- dit als er een video is, toon dan het Youtube logo -->
			<?php if ($field_machines_video): ?><img src="<?php print base_path() . path_to_theme(); ?>/images/youtube-logo.jpg" /><?php endif; ?>
        </div>
    </div><!--/.aanbod_machine-->   
</div>
<?php else: ?>
<!-- hier de volledig node -->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>

    <h2<?php print $title_attributes; ?>>
      <?php print $title; ?>
    </h2>
  
  <?php print render($title_suffix); ?>
  <div class="content clearfix"<?php print $content_attributes; ?>>
     <h3><?php print render($content['field_soort_machine']); ?></h3>	 
     <div class="cover_machine">
        <?php if ($field_machine_verkocht[0]["value"]==="ja"): ?>
            <div class="sold"></div><!-- een div verkocht over de image of video-->
			<?php if ($field_machines_video): ?>
				<?php print render($content['field_machines_video']); ?> <!-- toon de video met de banner verkocht-->
            <?php else: ?>      
        	<?php print render($content['field_machine_img'][0]); ?><!-- toon de foto met de banner verkocht, deze afbeelding (de eerste) wordt enkel getoond indien er geen video is toegevoegd -->
            <? endif; ?>
            
        <?php elseif (isset($field_machine_reserved[0]) && $field_machine_reserved[0]["value"]==="ja"): ?>
        	<div class="reserved"></div>
			<?php if ($field_machines_video): ?>
				<?php print render($content['field_machines_video']); ?> <!-- toon de video met de banner gereserveerd-->
        <?php else: ?> 
			<?php print render($content['field_machine_img'][0]); ?><!-- toon de afbeelding met banner gereserveerd -->
            <? endif; ?>

        <?php elseif (isset($field_nieuw_binnen[0]["value"]) && $field_nieuw_binnen[0]["value"]==="nieuw"): ?>
            <div class="nieuw"></div>
            <?php if ($field_machines_video): ?>
                <?php print render($content['field_machines_video']); ?> <!-- toon de video met de banner promo-->
            <?php else: ?>
                <?php print render($content['field_machine_img'][0]); ?><!-- toon de afbeelding met banner promo -->
            <? endif; ?>
            
        <?php elseif (count($field_machine_promo) && $field_machine_promo[0]["value"]==="ja"): ?>
        	<div class="promo"></div>
            <?php if ($field_machines_video): ?>
				<?php print render($content['field_machines_video']); ?> <!-- toon de video met de banner promo-->
        <?php else: ?>
        	<?php print render($content['field_machine_img'][0]); ?><!-- toon de afbeelding met banner promo -->
            <? endif; ?>
            
        <?php else: ?>        	
			<?php if ($field_machines_video): ?>
				<?php print render($content['field_machines_video']); ?> <!-- toon de video zonder banner-->
            <?php else: ?>       	
	 			<?php print render($content['field_machine_img'][0]); ?> <!-- toon de afbeelding zonder banner zie opmerking onderaan-->
			<?php endif; ?>
        <?php endif; ?>
     </div><!-- /cover_machine-->
     <div class="field_machine"><?php print render($content['field_vermogen']); ?></div>
     <div class="field_machine"><?php print render($content['field_prijs']); ?></div>
     <div class="field_machine"><?php print render($content['field_prijs_marge']); ?></div>
     <div class="field_machine"><?php if ($field_prijs_aanvraag): ?><strong>Prijs:</strong><br />Op aanvraag <?php endif; ?></div>
     <span class="bold">AC-machines bied aan:</span><br /> <?php print render($content['body']); ?>
     <div class="more_info_form"><a href="/node/16?title=<?php print $title; ?>"><div class="">Meer informatie aanvragen >> </div></a></div>
     <div class="cover_machine_all"><?php print render($content['field_machine_img']); ?></div>   
  </div>
</div>
<?php endif; ?>
<!-- enkele opmerkingen: als er een video inhoud is dan wordt de eerste image [0] niet meer als grote afbeelding getoond maar komt deze bij in de kleine afbeeldingen onderaan de node
weet nog niet goed hoe dit in elkaar zit (render($content['field_machine_img'][0]) maar hier komt dit goed uit -->