	<!--start overlay-->
	<div class="overlay toggle-icon"></div>
	<!--end overlay-->

	<!--Start Back To Top Button--> 
	<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
	<!--End Back To Top Button-->

	<footer class="page-footer">
			<p class="mb-0">Copyright © 2024. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->


	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/chartjs/chart.min.js"></script>
	<script src="assets/plugins/peity/jquery.peity.min.js"></script>
	<script src="assets/js/dashboard-eCommerce.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>


	<!-- START: DATATABLE -->
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.8/js/dataTables.jshttps://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>

	<script>
		new DataTable('#example', {
		    layout: {
		        topStart: {
		            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
		        }
		    }
		});
	</script>
	<!-- END: DATATABLE -->

	<!-- CK EDITOR -->
	<script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.0/"
            }
        }
    </script>
    <script type="module">
      	import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                plugins: [ Essentials, Paragraph, Bold, Italic ],
                toolbar: [ 'bold', 'italic' ]
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script type="module">
      	import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '#editor1' ), {
                plugins: [ Essentials, Paragraph, Bold, Italic ],
                toolbar: [ 'bold', 'italic' ]
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script type="module">
      	import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '#editor2' ), {
                plugins: [ Essentials, Paragraph, Bold, Italic ],
                toolbar: [ 'bold', 'italic' ]
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <!-- CK EDITOR -->


	<?php  
		ob_end_flush();
	?>
</body>

</html>