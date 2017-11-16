<?php
   include_once 'header.php';
?>
<script>

    // This is the first thing we add ------------------------------------------
    $(document).ready(function() {

        $('.rate_widget').each(function(i) {
            var widget = this;
            var out_data = {
                widget_id : $(widget).attr('id'),
                uid: "<?php echo $_SESSION['u_uid']?>",
                fetch: 1
            };
            $.post(
                'ratingsSql.php',
                out_data,
                function(INFO) {
                    $(widget).data( 'fsr', INFO );
                    //alert(INFO);
                    set_votes(widget);
                }
            );
        });


        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                //alert($(this).parent().data('fsr'));
                $(this).prevAll().addBack().addClass('ratings_over');
                $(this).nextAll().removeClass('ratings_vote');
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().addBack().removeClass('ratings_over');
                // can't use 'this' because it wont contain the updated data
                set_votes($(this).parent());
            }
        );


        // This actually records the vote
        $('.ratings_stars').on('click', function() {
            var star = this;
            var widget = $(this).parent();
            var clicked_data = {
                clicked_on : $(star).attr('class'),
                widget_id : $(star).parent().attr('id'),
                uid: "<?php echo $_SESSION['u_uid']?>"
            };
            $.post(
                'ratingsSql.php',
                clicked_data,
                function(INFO) {
                    $(widget).data( 'fsr', INFO );
                    set_votes(widget);
                }
            );
        });



    });

    function set_votes(widget) {

        var avg = $.trim($(widget).data('fsr'));
        //alert(avg);
        //var votes = $(widget).data('fsr').number_votes;
        //var exact = $(widget).data('fsr').dec_avg;

        //window.console && console.log('and now in set_votes, it thinks the fsr is ' + $(widget).data('fsr').number_votes);
        //alert($(widget).find('.star_' + avg).attr('class'));
        $(widget).find('.star_' + avg).prevAll().addBack().addClass('ratings_vote');
        //alert(avg);
        //$(widget).find('.star_' + avg).css("background-color", "red");
        $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote');
        //$(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
    }
    // END FIRST THING
</script>

<div class="container-fluid">
		<form action="" method="POST">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" name="submit" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
	  </form>
    <?php
		//if (isset($_POST['search'])){
      include 'includes/dbh.inc.php';
      require_once 'pagination.php';
      $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 25;
      $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
      $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 7;
      if (isset($_POST['search'])){
        $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);
      }else{
        $searchTerm      = ( isset( $_GET['searchTerm'] ) ) ? $_GET['searchTerm'] : '';
      }
      //$searchTerm='chair';
      $Paginator  = new Paginator( $conn, $searchTerm );
      $results    = $Paginator->getData( $limit, $page );
      echo $Paginator->createLinks( $links, 'pagination pagination-sm' );
      $imgPerRow=4;
      for( $i = 0; $i < count( $results->data ); $i++ ) {
        if ($i%$imgPerRow==0){
          echo '<div class="row">';
        }
        $name  =$results->data[$i]['name'];
      	$url=$results->data[$i]['url'];
        $id=$results->data[$i]['id'];
    		$filename=$results->data[$i]['filepath'];
        echo '<div class="col-md-'.round(12/$imgPerRow).'"><div class="thumbnail">';
        echo '<a  href="'.$url.'"><img class="square-image" src="pictures/'.$filename.'"></a>';
        echo '<div id="'.$id.'" class="rate_widget">
        <div class="star_1 ratings_stars"></div>
       <div class="star_2 ratings_stars"></div>
        <div class="star_3 ratings_stars"></div>
        <div class="star_4 ratings_stars"></div>
       <div class="star_5 ratings_stars"></div>
       </div>';
        echo '</div></div>';
        if ($i%$imgPerRow==3){
          echo '</div>';
        }
      }
    //}

    ?>

</div>
<?php
   include_once 'footer.php';
 ?>
