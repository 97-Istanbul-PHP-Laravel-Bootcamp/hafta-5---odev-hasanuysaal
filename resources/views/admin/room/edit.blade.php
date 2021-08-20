@extends('admin.layout.default')

@section('title', $title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.hotel') }}">Oteller</a></li>
    <li class="breadcrumb-item active">{{ $title }}</li>
@endsection

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary" style="padding: 10px">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <form method="post" action="{{ route('admin.room.save') }}">
                            @csrf
                            @if ($room->id)
                                <input type="hidden" name="id" value="{{ $room->id }}">
                                <a href="{{ route('admin.room.delete', ['id' => $room->id]) }}" class="btn btn-md btn-danger" style="margin: 10px" onclick="return areYouSureDelete()">Sil</a>
                                <a href="" class="btn btn-md btn-info j-modal" style="margin: 10px"  >Fiyat Güncelle</a>
                            @endif
                            <input type="hidden" name="hotel_id" value="{{ request()->get('hotel_id') }}">
                            <div class="form-group">
                                <label>Oda Adı</label>
                                <input type="text" class="form-control" name="name" value="{{ $room->name }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label>Yetişkin Sayısı</label>
                                <input type="number" class="form-control" name="adt_cnt" value="{{ $room->adt_cnt }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label>Çocuk Sayısı</label>
                                <input type="number" class="form-control" name="kid_cnt" value="{{ $room->kid_cnt }}"
                                       required>
                            </div>
                            <div class="form-group">
                                <label>Stok Sayısı</label>
                                <input type="number" class="form-control" name="stock" value="{{ $room->stock }}"
                                       required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Oda Özellikleri</label>
                                <div class="form-group">
                                    <label>Yatak Sayısı</label>
                                    <input type="text" class="form-control" name="info_s[bed_cnt]"
                                           value="{{ isset($room->info_s['bed_cnt']) ? $room->info_s['bed_cnt'] : 0 }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Metre Kare</label>
                                    <input type="text" class="form-control" name="info_s[bed_cnt]"
                                           value="{{ isset($room->info_s['sqr_mtr']) ? $room->info_s['sqr_mtr'] : 0 }}">
                                </div>
                                @foreach (App\Models\Room::getRoomFeatures() as $data)
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox"
                                               id="cbox-spec-{{ $data["name"] }}" value="{{ $data["name"] }}"
                                               name="info_s[{{ $data["name"] }}]" {{ $room->isChecked($data) }}>
                                        <label for="cbox-spec-{{ $data["name"] }}" class="custom-control-label">
                                            {{ $data["title"] }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <button type="submit" style="float: right" class="btn btn-primary">Gönder</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

@endsection
