<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Data&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-plus-sign"></span></button>
	<hr/>
	<div class="container">
			 <div class="table-responsive">
			  <table class="table table-hover" id="tab" cellspacing="0" width="100%">
				<thead>
				  <tr>
					<th>No</th>
					<th>Nama</th>
					<th>kategori</th>
					<th>Umur</th>
					<th>Gender</th>
					<th>Alamat</th>
					<th>Nomor Hp</th>
					<th>Action</th>
				  </tr>
				</thead>
				 </table>
			 </div>
		 </div>

<?php include 'mod.php'; ?>

</div>
<script type="text/javascript">
$(document).ready(function() {

	$('#myModal').on('hidden.bs.modal', function() {
	$('#addapotek').formValidation('resetForm', true);
	});

  $('#addapotek').formValidation({
        message: 'This value is not valid',
	    excluded: ':disabled',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nama: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and can\'t be empty'
                    }
                }
            },
            umur: {
                validators: {
					notEmpty: {
                        message: 'umur is required and can\'t be empty'
                    },
                    lessThan: {
                        value: 100,
                        inclusive: true,
                        message: 'The ages has to be less than 100'
                    },
                    greaterThan: {
                        value: -12,
                        inclusive: false,
                        message: 'The ages has to be greater than or equals to 1'
                    }
                }
            },
			 gender: {
                    validators: {
                        notEmpty: {
                            message: 'Belum diPilih'
                        }
                    }
                },
			 kategori: {
                    validators: {
                        notEmpty: {
                            message: 'Belum diPilih'
                        }
                    }
                },
			 alamat: {
                message: 'alamat is not valid',
                validators: {
                    notEmpty: {
                        message: 'alamat is required and can\'t be empty'
                    }
                }
            },
			keluhan: {
                message: 'keluhan is not valid',
                validators: {
                    notEmpty: {
                        message: 'keluhan is required and can\'t be empty'
                    }
                }
            },
			penunjang: {
                message: 'penunjang is not valid',
                validators: {
                    notEmpty: {
                        message: 'penunjang is required and can\'t be empty'
                    }
                }
            },
			alergi: {
                message: 'alergi is not valid',
                validators: {
                    notEmpty: {
                        message: 'alergi is required and can\'t be empty'
                    }
                }
            },
			obat: {
                message: 'obat is not valid',
                validators: {
                    notEmpty: {
                        message: 'obat is required and can\'t be empty'
                    }
                }
            },
			tarif: {
                message: 'T is not valid',
                validators: {
                    notEmpty: {
                        message: 'T is required and can\'t be empty'
                    }
                }
            }
        }
    })
		.on('success.form.fv', function(e) {
				// Prevent form submission
				e.preventDefault();

				var $form = $(e.target),
						fv    = $form.data('formValidation');

				// Use Ajax to submit form data
				$.ajax({
						url: $form.attr('action'),
						type: 'POST',
						data: $form.serialize(),
						success: function(result) {

							$('#myModal').modal('hide');
							bootbox.alert('Data Berhasil Masuk');

						}
				});
		});
});

$(document).on("click", "#alert", function(e) {
				 var link = $(this).attr("href"); // "get" the intended link in a var
				 e.preventDefault();
				 bootbox.confirm("Are you sure delete ?", function(result) {
						 if (result) {
								 document.location.href = link;  // if result, "set" the document location
						 }
				 });
		 });

</script>
