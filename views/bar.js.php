<script>
<?php if (get_option('m2g_bar_tgmplibs') !== ''): ?>
window.tgmplibs='<?php echo $this->get_option('m2g_bar_tgmplibs')?>';
<?php endif; ?>
      window===top && document.write('<script id="tgmpjs" src="http://mpl.tunegenie.com/js/loader.min.js?'+Math.random()+'"><\/script>');
</script>
<script id="tgmpjs">
      top.tgmp?top.tgmp.onload():window.tgmp=new TuneGenieMediaPlayer('playerbar',
    { brand: '<?php echo $this->get_option('m2g_bar_brand') ?>',
      zindex: '<?php echo $this->get_option('m2g_bar_zindex') ?>',
      theme: <?php echo $this->get_option('m2g_bar_theme') ?>,
      position: '<?php echo $this->get_option('m2g_bar_position') ?>',
      debug: <?php echo $this->get_option('m2g_bar_debug') ?>,
      ios_frame: <?php echo $this->get_option('m2g_bar_ios_frame') ?>,
      autostart: <?php echo $this->get_option('m2g_bar_autostart') ?>,
      infoTrayOnLoad: true,
      useTritonPlayer: <?php echo $this->get_option('m2g_bar_tritonplayer') ?>,
      promptZag: <?php echo $this->get_option('m2g_bar_zag') ?>,
      delayed_frame: true}
);
var tgmp_rc=top.tgmp_rc||new TuneGenieRC(tgmp);
tgmp_rc.recentSongWidget(document.getElementById('tgrecent'),{});
tgmp_rc.nowPlayingWidget(document.getElementById('tgnowplaying'),{});
</script>