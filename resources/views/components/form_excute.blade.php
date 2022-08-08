<form class="p-3" action="{{ route('estimation.excute') }}" method="post" enctype="multipart/form-data" id="excute-form">
    @csrf
    <div class="form-group text-center">
        <input type="file" class="form-control-file" id="video" name="video">
    </div>
    <div class="form-group">
        <label for="param1">Loại phương tiện</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="all" name="all">
            <label class="form-check-label" for="all">
              Tất cả
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="motobike" name="motobike" checked>
            <label class="form-check-label" for="motobike">
              Xe máy
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="car" name="car">
            <label class="form-check-label" for="car">
              Ô tô
            </label>
        </div>
    </div>
    <div class="form-group">
        <label for="rwf">Chiều dài mép đường thứ nhất (m)</label>
        <input type="text" class="form-control" id="rwf" name="rwf" placeholder="Ví dụ: 5.0">
    </div>
    <div class="form-group">
        <label for="rws">Chiều dài mép đường thứ hai (m)</label>
        <input type="text" class="form-control" id="rws" name="rws" placeholder="Ví dụ: 12.0">
    </div>
    <div class="form-group">
        <label for="rws">Giới hạn tốc độ (km/h)</label>
        <input type="text" class="form-control" id="speed" name="speed" placeholder="Ví dụ: 20">
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-app" id="excute" form="excute-form">Thực thi</button>
        <button type="button" class="btn btn-app" id="reset">Hủy bỏ</button>
    </div>
</form>