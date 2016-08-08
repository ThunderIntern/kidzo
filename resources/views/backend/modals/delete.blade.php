<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			{!! Form::open(['id' => 'submitDelete', 'method' => 'delete' ]) !!}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modalDeleteLabel">Are You Sure?</h4>
				</div>
				<div class="modal-body">
					<p>Masukkan password Anda untuk menghapus data.</p>
					{!! Form::password('password', ['class' => 'form-control']) !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary-outline" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-danger-outline">Hapus</button>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

@section('scripts')
	$('#modalDelete').on('show.bs.modal', function (e) {
	    url = $(e.relatedTarget).data('action');
	    $('#submitDelete').attr('action', url);

		@if(is_null($page_datas->id))
			$(e.relatedTarget).parent().parent().css({'background-color':'#FF8A8A'});
		@endif
	});

	@if(is_null($page_datas->id))
		$('#modalDelete').on('hidden.bs.modal', function (e) {
			$('table > tbody > tr').css('background-color', '');
		});
	@endif
@append