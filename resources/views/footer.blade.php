
						</div>

						
					</div>
					<!-- /main charts -->

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2021. <a href="" target="_blank"></a> by <a href="javascript:void(0)" target="_blank"></a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

<?php
	if( isset($_SESSION['response']) && isset($_SESSION['msg']) ) {
		if( $_SESSION['response'] == 'success' ) {
			$class = 'bg-success';
		} else {
			$class = 'bg-danger';
		}

		if( !empty($_SESSION['msg']) ) {
			$msg = $_SESSION['msg'];
		}
?>		
		<script type="text/javascript">
			$(document).ready(function(){
				new PNotify({
		            text: '<?=$msg?>',
		            addclass: '<?=$class?>'
		        });
			});
		</script>
<?php
	}  
?>


<script type="text/javascript">
	function show_notify(text, bg_class) {
		new PNotify({
            text: text,
            addclass: bg_class
        });
	}

	function enable_switchery() {
        if (Array.prototype.forEach) {
            var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
            elems.forEach(function(html) {
                var switchery = new Switchery(html);
            });
        }
        else {
            var elems = document.querySelectorAll('.switchery');
            for (var i = 0; i < elems.length; i++) {
                var switchery = new Switchery(elems[i]);
            }
        }
    }

	</script>
</body>
</html>


