$(document).ready(function(){
		

    //real time halaman dashboard.php
            setInterval(function() {
                $('.load-transaksi').load('load-transaksi.php');
                                  }, 100);



});