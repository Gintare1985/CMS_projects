<?php include "includes/admin_header.php"; ?>

<?php

$post_count = countRecords(getAllUserPosts());
$comment_count = countRecords(getAllPostsUserComments());
$category_count = countRecords(getAllUserCategories());
$post_published_count = countRecords(checkUserStatus('posts', 'post_status', 'published'));

$post_draft_count = countRecords(checkUserStatus('posts', 'post_status', 'draft'));

$unapproved_comment_count = countRecords(getAllPostsUserUnapprovedComments());
?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                           <small>Role: Admin</small>
                            <small>WELCOME to admin</small>
					<small><?php echo strtoupper(getUserName()); ?></small>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->

                <!-- /.row -->

<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php echo "<div class='huge'>" . $post_count . "</div>" ?>

						<!--<div class='huge'><?php //echo $post_count = recordCount('posts'); ?></div>-->
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    	<div class='huge'>
                    	<?php //echo $comment_count = recordCount('comments'); ?>
                    	<?php echo $comment_count; ?>
                    	</div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
						<div class='huge'><?php //echo $category_count = recordCount('categories'); ?>
							<?php echo $category_count ; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
	<div class="row">

     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
			<?php

	$element_text = ['All Posts','Active Posts', 'Draft Posts', 'Comments', 'Pend Comments', 'Categories'];

	$element_count = [$post_count, $post_published_count, $post_draft_count, $comment_count, $unapproved_comment_count, $category_count];

		for($i = 0; $i < 6; $i++) {

			echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";

		}

			?>

        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

     <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

	</div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php"; ?>
