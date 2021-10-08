<button class="btn btn-xs btn-outline-light edit_btn"
        data-level="{{$level}}"
        data-target="{{$data->target}}"
        data-custom_css="{{$data->custom_css}}"
        data-alt_text="{{$data->alt_text}}"
        data-post="{{$data->post_id}}"
        data-category="{{$data->category_id}}"
        data-image="{{$data->image}}"
        data-title="{{$data->display_name}}"
        data-id="{{$data->id}}">Edit</button>
<button class="btn btn-outline-light btn-xs delete_btn" data-id="{{$data->id}}">
    <i class="far fa-trash-alt"></i>
</button>
