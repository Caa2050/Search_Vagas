<?php

 if(isset($_SESSION['mensagem'])){?>
   
    <script type="text/javascript">
   window.onload = function(){
    //mensagem
      M.toast({html: '<?php echo $_SESSION['mensagem'];?>'})
   };
 </script>
 <?php
}
?>