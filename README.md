#Eindwerk Drupal project Vandenborne Stefaan
##Eindwerk Drupal project
Website: http://www.acmachines-minitractors.be/ of http://www.ac-machines.be
1. De Home pagina
Skeleton: A Beautiful Boilerplate for Responsive, Mobile-Friendly Development http://www.getskeleton.com/
Regions
 De contactgegevens met een link naar de locatie van de zaak
 Een view slideshow
 De laatst toegevoegde tractor (linkerzijbalk)
 Een promotie model (rechterzijbalk)
 In de footer alle aangeboden merken
Eindwerk Drupal project Vandenborne Stefaan
2. De tractors pagina
Een opsomming van alle machines met 1 foto, korte beschrijving, de prijs, een YouTube icon als er een video is toegevoegd en een link naar zijn node, ook de verkochte machine blijven getoond maar dan met een vermelding over de foto ‘Verkocht’
Een promo model of een gereserveerd model zijn snel herkenbaar door de schuine band over de afbeelding van desbetreffende machine.
Eindwerk Drupal project Vandenborne Stefaan
De volledige node van de tractors maar ook van de auto’s.
Indien er een video is toegevoegd wordt deze getoond op de plaats van de grote foto, eerste afbeelding van deze node, hieronder de code om enkel de eerste afbeelding af te printen <?php print render($content['field_machine_img'][0]); ?>
3. Auto pagina Dit heeft als bron hetzelfde inhoudstype als de tractors, filter hier op een extra veld ‘field_tractors_auto’
Eindwerk Drupal project Vandenborne Stefaan
Het inhoudstype ‘Machines’

###Inhoud aanmaken.
Eindwerk Drupal project Vandenborne Stefaan
De view voor de pagina tractors is vrij basic
1. Bij formaat ‘Inhoud / Teaser’
2. Filter inhoudstype = machines en ‘Tractor/auto’ (= Tractor)
De pagina view auto’s is enkel het filter inhoudstype = machines en ‘Tractor/auto’ (=Auto)
De blok op de homepagina ‘Nieuw binnengekomen’ dit is de enige view die gebruik maakt van ‘velden’
Promoblok op de homepagina geen velden maar teaser, de filter is iets uitgebreider dan gewoonlijk omdat
wel enkel een promo machine willen tonen dat niet verkocht of gereserveerd is. De opmaak van deze blok
wordt verzorgd door dezelfde ‘node—machines.tpl.php’ als de pagina’s “Tractors” en “Auto’s”
Eindwerk Drupal project Vandenborne Stefaan
Manage display voor de volledige node
Manage display voor de teaser node
Heb heel sterk gewerkt rond usability, de editor (Alain) dient enkel aan te vinken of een machine verkocht, gereserveerd of een promo is, afhankelijk van zijn keuze wordt er dan een transparante png over de afbeelding of video geplaatst.
De CSS code voor de 3 mogelijkheden.
.sold, .reserved, .promo { background-repeat: no-repeat; background-position: left top; height: 100px; width: 100px; position: absolute; }
.sold { background-image: url(../images/sold.png); }
.reserved { background-image: url(../images/Gereserveerd.png); }
.promo { background-image: url(../images/promo.png); }

Code node—machines.tpl.php
´´´
1. <?php if ($teaser): ?><!-- teaser weergave op de pagina overzicht tractors en auto's zelfde inhoudstype met een extra veld(tractor/auto - vinkje)-->
2. <div class="wrapper_aanbod_teaser">
3. <div class="aanbod_machine">
4. <?php // print_r ($field_machine_promo) ?><!-- dit om te testen-->
5. <?php if ($field_machine_verkocht["und"][0]["value"]==="ja"): ?><!-- indien machine verkocht toon de banner verkocht -->
6. <div class="sold"></div><?php print render($content['field_machine_img'][0]); ?>
7. <?php elseif ($field_machine_reserved["und"][0]["value"]==="ja"): ?><!-- indien machine gereserveerd toon de banner gereserveerd -->
8. <div class="reserved"></div><?php print render($content['field_machine_img'][0]); ?>
9. <?php elseif (count($field_machine_promo) && $field_machine_promo["und"][0]["value"]==="ja"): ?><!-- toon de banner promo om een of andere duistere rede moet ik hier het field gaan tellen naar inhoud - foutcode (Notice: Undefined index: und in include() (line 12 of/ home/acmachines/ domains/acmachines-minitractors.be/ public_html/sites/all/themes/skeletontheme/ templates/ node--machines.tpl.php).( -->
10. <div class="promo"></div><?php print render($content['field_machine_img'][0]); ?>
11. <?php else: ?>
12. <?php print render($content['field_machine_img'][0]); ?> <!-- niet verkocht, niet gereserveerd en geen promo toon het eerste beeld van het machine-->
13. <?php endif; ?>
14. <div class="title_mach_teaser"><?php print $title; ?></div>
15. <?php print render($content['field_soort_machine']); ?>
16. <?php print render($content['field_vermogen']); ?>
17. <?php print render($content['field_prijs']); ?>
18. <?php print render($content['field_prijs_marge']); ?>
19. <?php if ($field_prijs_aanvraag): ?><strong>Prijs:</strong><br />Op aanvraag <?php endif; ?>
20. <div class="more_info_teaser"><a href="<?php print $node_url; ?>">Meer informatie >></a></div> <!-- een meer info link naar de volledige node -->
21. <div class="youtube_logo"><!-- dit als er een video is, toon dan het Youtube logo -->
22. <?php if ($field_machines_video): ?><img src="<?php print base_path() . path_to_theme(); ?>/images/youtube-logo.jpg" /><?php endif; ?>
23. </div>
24. </div><!--/.aanbod_machine-->
25. </div><!--/. wrapper_aanbod_teaser -->
26. <?php else: ?>
27. <!-- hier de volledig node -->
28. <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
29. <?php print render($title_prefix); ?>
30.
31. <h2<?php print $title_attributes; ?>>
32. <?php print $title; ?>
33. </h2>
34.
35. <?php print render($title_suffix); ?>
36. <div class="content clearfix"<?php print $content_attributes; ?>>
37. <h3><?php print render($content['field_soort_machine']); ?></h3>
38. <div class="cover_machine">
39.
40. <?php if ($field_machine_verkocht[0]["value"]==="ja"): ?>
41. <div class="sold"></div><!-- een div verkocht over de image of video-->
42. <?php if ($field_machines_video): ?>
43. <?php print render($content['field_machines_video']); ?> <!-- toon de video met de banner verkocht-->
44. <?php else: ?>
45. <?php print render($content['field_machine_img'][0]); ?><!-- toon de foto met de banner verkocht, deze afbeelding (de eerste) wordt enkel getoond indien er geen video is toegevoegd -->
46. <? endif; ?>
47.
48. <?php elseif (isset($field_machine_reserved[0]) && $field_machine_reserved[0]["value"]==="ja"): ?>
49. <div class="reserved"></div>
50. <?php if ($field_machines_video): ?>

51. <?php print render($content['field_machines_video']); ?> <!-- toon de video met de banner gereserveerd-->
52. <?php else: ?>
53. <?php print render($content['field_machine_img'][0]); ?><!-- toon de afbeelding met banner gereserveerd -->
54. <? endif; ?>
55.
56. <?php elseif (count($field_machine_promo) && $field_machine_promo[0]["value"]==="ja"): ?>
57. <div class="promo"></div>
58. <?php if ($field_machines_video): ?>
59. <?php print render($content['field_machines_video']); ?> <!-- toon de video met de banner promo-->
60. <?php else: ?>
61. <?php print render($content['field_machine_img'][0]); ?><!-- toon de afbeelding met banner promo -->
62. <? endif; ?>
63.
64. <?php else: ?>
65. <?php if ($field_machines_video): ?>
66. <?php print render($content['field_machines_video']); ?> <!-- toon de video zonder banner-->
67. <?php else: ?>
68. <?php print render($content['field_machine_img'][0]); ?> <!-- toon de afbeelding zonder banner zie opmerking onderaan-->
69. <?php endif; ?>
70. <?php endif; ?>
71. </div><!-- /cover_machine-->
72. <div class="field_machine"><?php print render($content['field_vermogen']); ?> </div>
73. <div class="field_machine"><?php print render($content['field_prijs']); ?> </div>
74. <div class="field_machine"><?php print render($content['field_prijs_marge']); ?> </div>
75. <div class="field_machine"><?php if ($field_prijs_aanvraag): ?><strong>Prijs:</strong><br />Op aanvraag <?php endif; ?> </div>
76. <span class="bold">AC-machines bied aan:</span><br /> <?php print render($content['body']); ?>
77. <div class="more_info_form"><a href="/node/16?title=<?php print $title; ?>"><div class="">Meer informatie aanvragen >> </div></a></div><!—print een link naar een webform voor meer info en print de titel van de node in het eerste veld van deze form-->
78. <div class="cover_machine_all"><?php print render($content['field_machine_img']); ?> </div> <!—print alle resterende beelden van deze node -->
79. </div>
80. </div>
81. <?php endif; ?>
82. <!-- enkele opmerkingen: als er een video inhoud is dan wordt de eerste image [0] niet meer als grote afbeelding getoond maar komt deze bij in de kleine afbeeldingen onderaan de node
83. weet nog niet goed hoe dit in elkaar zit (render($content['field_machine_img'][0]) maar hier komt dit goed uit -->
´´´
Het zou niet de beste oplossing zijn om php logica in de .tpl.php files te plaatsen volgens volgend artikel https://www.acquia.com/blog/5-mistakes-avoid-your-drupal-website-number-1-architecture De pdf file over dit artikel staat in de map dropbox/drupal-project/deel/5_mistakes_ebook.pdf
Mistake: PHP code or other logic in the database or in template ( .tpl .php) files. Solution: Write all logic, including PHP, calls to web services, and SQL queries, in modules or theme preprocess functions if necessary.
Dit is misschien iets om bij een volgend eindwerk uit te werken.

###Preformance
De default cache is geactiveerd wil hier ook niet te ver ingaan omdat de editor (Alain) dagelijks nieuwe producten toevoegt en aanpast, vooral bij aanpassingen wordt de aanpassing niet onmiddellijk getoond.
In het ‘html.tpl.php’ bestand is het invoegen van JavaScript naar einde van de page verhuisd op aanraden van ‘Google Devolopers PageSpeed’, de css <?php print $styles; ?> zou ook op dezelfde plaats kunnen komen maar het probleem is dat bij het wisselen van de pagina’s deze heel even getoond wordt zonder opmaak, ook deze oplossing geeft geen verbetering naar score.
´´´
<?php print $scripts; ?>
<?php print $page_bottom; ?>
</body>
</html>
´´´
###SEO
Krijg deze score bij alle pagina’s de editor (Alain) zorgt ervoor dat bij elke toegevoegde afbeelding een ALT image tag wordt opgegeven, had dit graag als required ingesteld maar deze mogelijkheid is er niet, had dit misschien aan Dries moeten voorstellen om dit in Drupal 8 in te bouwen .
Modules
De gebruikelijke, geen die we nog nooit hebben gebruikt, de module ‘Views UI’ is wel uitgeschakeld dit wegens performance overwegingen.