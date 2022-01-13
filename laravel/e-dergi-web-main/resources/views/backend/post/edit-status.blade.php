<!-- Modal-->
<div class="modal fade" id="status_{{$post->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="row">
				<div class="col-md-3 col-xs-12">
					<!--begin::Card-->
					<div class="card card-custom gutter-b">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Post Geçmişi</h3>
							</div>
						</div>
						<div class="card-body">
							@foreach($post->transactions as $transaction)
							<h5 class="font-weight-bolder text-dark">{{$transaction->first()->created_at->format('d/m/Y')}}</h5>
							<!--begin::Timeline-->
							<div class="timeline timeline-6 mt-3">
								@foreach($transaction as $trans)
								<!--begin::Item-->
								<div class="timeline-item align-items-start">
									<!--begin::Label-->
									<div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{$trans->created_at->format('H:i')}}</div>
									<!--end::Label-->
									<!--begin::Badge-->
									<div class="timeline-badge">
										<i class="fa fa-genderless text-danger icon-xl" style="color: #{{$trans->status->hex_color_code}} !important;"></i>
									</div>
									<!--end::Badge-->
									<!--begin::Desc-->
									@if($request->transaction == $trans->id)
									<div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
									@else
									<div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">
									@endif
										{{$trans->createdBy->name}} : <span style="color: #{{$trans->status->hex_color_code}} !important;">{{$trans->status->name}}</span> <br>
										{{$trans->status_description ?? '-'}} <br>
										<button type="button" class="btn btn-link text-primary" data-toggle="modal" data-target="#transaction-{{$trans->id}}">
											{{$trans->title}}
										</button>
									</div>
									<!--end::Desc-->
								</div>
								<!--end::Item-->

								<!-- Modal-->
								<div class="modal fade" id="transaction-{{$trans->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">{{$trans->id}} - {{$trans->title}}</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<i aria-hidden="true" class="ki ki-close"></i>
												</button>
											</div>
											<div class="modal-body">
												<div class="form-group">
													<strong>Başlık </strong> <br>
													{{ $post->title }}
												</div>
												<div class="form-group">
													<strong>Açıklama </strong> <br>
													{{ $post->description }}
												</div>
												<div class="form-group">
													<strong>İçerik </strong> <br>
													{!! $post->content !!}
												</div>
											</div>
										</div>
									</div>
								</div>

								@endforeach
							</div>
							<!--end::Timeline-->
							@endforeach
						</div>
					</div>
					<!--end::Card-->
			  </div>
			  <div class="col-md-7 col-xs-12">
			    <!--begin::Card-->
			    <div class="card card-custom gutter-b example example-compact">
			      <div class="card-header">
			        <h3 class="card-title">Post Düzenle</h3>
			      </div>
			      <!--begin::Form-->
			      <form method="POST" action="{{route('post.update')}}" enctype="multipart/form-data">
			        {{csrf_field()}}

			        <input type="text" name="id" id="id" value="{{ $post->id }}" hidden />

			        <div class="card-body">

			        	@if($onuser->role->slug != 'author')
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
			                <label for="status_id">Durumu <span class="text-danger">*</span></label>
			                <select class="form-control" id="status_id" name="status_id" data-post_status_id="{{ $post->status_id }}">
			                  @foreach($situations as $situation)
			                  <option value="{{$situation->id}}" {{ $post->status_id == $situation->id ? 'selected' : '' }}>{{$situation->name}}</option>
			                  @endforeach
			                </select>
			                @error('status_id')
			                <div class="invalid-feedback">{{ $message }}</div>
			                @enderror
			              </div>
			            </div>
			            <div class="col-md-6" id="div-status_description" style="display: none;">
			              <div class="form-group">
			                <label for="status_description">Durum Açıklaması <span class="text-danger">(Durum değiştirildiğinde zorunludur.)</span></label>
			                <input type="text" class="form-control @error('status_description') is-invalid @enderror" placeholder="Durum Açıklaması" name="status_description" id="status_description" value="{{ old('status_description') }}" maxlength="255" />
			                @error('status_description')
			                <div class="invalid-feedback">{{ $message }}</div>
			                @enderror
			              </div>
			            </div>
			          </div>
			          @else
			          <div class="row">
			            <div class="col-md-6">
			            	<div class="form-group">
			                <label for="status_id">Durumu </label>
			                <div><strong>{{ $post->status->name }}</strong></div>
			              </div>
			            </div>
			            <div class="col-md-6">
			              <div class="form-group">
			                <label for="status_description">Durum Açıklaması</label>
			                <input type="text" class="form-control @error('status_description') is-invalid @enderror" placeholder="Durum Açıklaması" name="status_description" id="status_description" value="{{ old('status_description') }}" maxlength="255" />
			                @error('status_description')
			                <div class="invalid-feedback">{{ $message }}</div>
			                @enderror
			              </div>
			            </div>
			          </div>
			          @endif
			          
			        </div>
			        <div class="card-footer">
			          <button type="submit" class="btn btn-primary mr-2">Kaydet</button>
			        </div>
			      </form>
			      <!--end::Form-->
			    </div>
			    <!--end::Card-->
			  </div>
			</div>

		</div>
	</div>
</div>