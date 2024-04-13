<script src="theme/plugins/jquery/jquery.min.js"></script>
<script src="theme/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="theme/plugins/summernote/summernote-bs4.min.js"></script>
<script src="theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="theme/dist/js/adminlte.js"></script>
<script src="theme/dist/js/jquery.session.js"></script>



<script type="text/javascript">
          $(document).ready( function() {
              var url = window.location.pathname, 
              urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); 
              $('.mt-2 ul li a').each(function(){
                 if(urlRegExp.test(this.href.replace(/\/$/,''))){
                    $(this).parent().addClass('menu-open').parent().parent().addClass('menu-open');
                  }
              });

          });
</script>

