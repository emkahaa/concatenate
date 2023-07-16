<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Cek Ongkir</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/') }}vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/') }}vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/') }}vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}vendors/styles/style.css" />
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="#">
                    <img src="https://cdn-icons-png.flaticon.com/512/3063/3063822.png" alt="" style="height: 38px;"/>
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex flex-wrap justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
					<div
						class="login-box bg-white box-shadow border-radius-10"
						style="margin: 0px auto;"
					>
						<div class="login-title">
							<h2 class="text-center text-primary">Cek Ongkir</h2>
						</div>
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								@foreach ($errors->all() as $error)
								{{ $error }}
								@endforeach
				
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif
						<form action="{{ route('cekOngkir.hasil') }}" method="POST">
							@csrf
							<div class="form-group custom">
								<label>Kota Asal</label>
								<select
									class="custom-select2 form-control"
									id="asal"
									name="asal"
									required
									style="width: 100%; height: 38px"
								>
								@foreach ($data['cities'] as $item)
									<option
										value="{{ $item->data }}"
										{{ $item->data == old('asal', $data['request']->asal) ? 'selected' : '' }}
										>{{ $item->value }}</option>
								@endforeach
								</select>
							</div>
							<div class="form-group custom">
								<label>Kota Tujuan</label>
								<select
									class="custom-select2 form-control"
									id="tujuan"
									name="tujuan"
									required
									style="width: 100%; height: 38px"
								>
								@foreach ($data['cities'] as $item)
									<option
										value="{{ $item->data }}"
										{{ $item->data == old('tujuan', $data['request']->tujuan) ? 'selected' : '' }}
										>{{ $item->value }}</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
								<label>Berat Kiriman (gram)</label>
								<input
									class="form-control"
									type="text"
									id="berat"
									name="berat"
									required
									placeholder="Berat Kiriman"
									value="{{ old('berat', $data['request']->berat) }}">
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<input
											class="btn btn-primary btn-lg btn-block"
											type="submit"
											value="Cek Ongkir">
									</div>
								</div>
							</div>
						</form>
					</div>
                </div>
                <div class="col-md-6 col-lg-9">
					@foreach ($data['results'] as $item)
					<div class="card card-box mb-20">
						<div class="card-body">
							<h5 class="card-title weight-500">{{ strtoupper($item['code']) }}</h5>
							<p class="card-text">
								{{ $item['name'] }}
							</p>
							<div class="row">
								@foreach ($item['costs'] as $cost)
								<div class="col-md-4 mb-20">
									<div
										class="card-box pricing-card-style2"
										style="padding: 15px;">
										<div class="pricing-card-header">
											<div class="left">
												<h5>{{ $cost['service'] }}</h5>
												<p>{{ $cost['description'] }}</p>
											</div>
											<div class="right">
												<div class="pricing-price">
													Rp. {{ number_format($cost['cost'][0]['value']) }}
													<span>{{ str_replace("HARI","",$cost['cost'][0]['etd']) }} hari</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					@endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('/') }}vendors/scripts/core.js"></script>
    <script src="{{ asset('/') }}vendors/scripts/script.min.js"></script>
    <script src="{{ asset('/') }}vendors/scripts/process.js"></script>
    <script src="{{ asset('/') }}vendors/scripts/layout-settings.js"></script>
</body>

</html>
