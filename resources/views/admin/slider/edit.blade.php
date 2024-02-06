@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Slider</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#" style="pointer-events: none">Manage Website</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Slider</a></div>
        <div class="breadcrumb-item">Edit Slider</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Slider</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label>Preview</label>
                        <br>
                        <img src="{{ asset($slider->banner) }}" alt="preview-banner" width="200px">
                    </div>
                    <div class="form-group">
                        <label>Banner</label>
                        <input type="file" class="form-control" name="banner">
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" value="{{ $slider->type }}">
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                    </div>
                    <div class="form-group">
                        <label>Starting Price</label>
                        <input type="text" class="form-control" name="starting_price" value="{{ $slider->starting_price }}">
                    </div>
                    <div class="form-group">
                        <label>Button Url</label>
                        <input type="text" class="form-control" name="btn_url" value="{{ $slider->btn_url }}">
                    </div>
                    <div class="form-group">
                        <label>Serial</label>
                        <input type="text" class="form-control" name="serial" value="{{ $slider->serial }}">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
