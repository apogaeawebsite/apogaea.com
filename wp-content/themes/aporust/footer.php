<footer>
                    
                    
<div id="footer-floater">
<a href="/" class="buttonize"><span>Apogaea.com Home Page</span></a><br />
<a href="http://volunteer.apogaea.com/" class="buttonize"><span>Volunteer Signup Database</span></a><br />
<a href="http://wiki.apogaea.com" class="buttonize"><span>KITTYbase (auth required)</span></a>
</div>


	<ul id="footer-site-map">
<?php 

$my_pages = wp_list_pages('echo=0&title_li=&depth=2&exclude=2008');
$var1 = '<a';
$var2 = '<span class="footer"><a';
$var3 = '</a>';
$var4 = '</a></span>';
$my_pages = str_replace($var1, $var2, $my_pages);
$my_pages = str_replace($var3, $var4, $my_pages);
echo $my_pages;

?> 
<li>Find Us Online<ul>
<li><a target="_blank" href="https://www.facebook.com/groups/apogaea/" class=" " alt="Facebook" title="Facebook"><span>Join our Facebook Group</span></a></li>
<li><a target="_blank" href="http://groups.yahoo.com/group/apogaea/" class=" " alt="Yahoo!" title="Yahoo!"><span>Subscribe to our Yahoo! Mailing List</span></a></li>
<li><a target="_blank" href="http://twitter.com/#!/apogaea" class=" " alt="Twitter" title="Twitter"><span>Follow us on Twitter</span></a></li>
<li><a target="_blank" href="http://feeds.feedburner.com/Apogaea" class=" " alt="RSS" title="RSS"><span>Subscribe to our RSS Feed</span></a></li>
<li><a href="http://www.flickr.com/groups/apogaea/" class=" " alt="Flickr" title="Flickr"><span>Join Our Flickr Group</span></a></li>
<li><a target="_blank" href="http://apogaea.tribe.net/" class=" " alt="Tribe" title="Tribe"><span>Join Our Tribe</span></a></li>
<li><a target="_blank" href="/apo-org/contact-us/" class=" " alt="Email US Directly" title="Email US Directly"><span>Email Us</span></a></li>
</ul></li>
<li>Other Useful Stuff <ul> <?php
wp_list_bookmarks(array('title_li' => '', 'categorize' => false));
?>
  </ul></li>
  
</ul>


<p style="text-align: center;" class="fancy"><small>&copy; <?= date('Y'); ?> Apogaea &bull; Graphic design by <a href="/apo-org/ignition/jason-kemo-santiago/">Kemo</a> &bull; Volunteer Database by <a href="/apo-org/ignition/bug-barbeque/">Bug</a> &bull; Wordpress Theme by <a href="/apo-org/ignition/scott-koda-dudley/">Koda</a> <br /> Special thanks to all our volunteers! &bull;  Flame On Flaming Art!</p>

<p style="text-align: center;"><small>Problems? Notify the <a href="mailto:webmonkeys@apogaea.com">webmonkeys@apogaea.com</a></small></p>


<p style="text-align: center;" class="fancy"><small><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br />The Apogaea logo and branding, as well as the fictional character 'Flaming Art' are licensed under:<br /> <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.</small></p>
		<?php wp_footer(); ?>


    <div style="text-align:center"><img src="<?php bloginfo('template_directory'); ?>/javascript/particle.png"  /></div>

    </footer>

    <script src="<?php bloginfo('template_directory'); ?>/javascript/particle.js"></script>

    <script type="text/javascript">
      jQuery(document).ready(function(){

        var emitter = new particle_emitter({
          image: ['<?php bloginfo('template_directory'); ?>/javascript/particle.png'],
          center: ['50%','50%'], offset: [0, 0], radius: 0,
          size: 16, velocity: 80, decay: 1000, rate: 40
        });

        $(document).mousemove(function(e) { emitter.centerTo(e.pageX, e.pageY);});

        $('header').mouseup(function(e){
            emitter.start();
            function stopemit() {
              emitter.stop();
            }
            setTimeout(stopemit, 200);

        }); 
        

      })

      
    </script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2432342-11']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    <script src="<?php bloginfo('template_directory'); ?>/javascript/menu.js"></script>
    <style type="text/css">

    </style>
  </body>
</html>
