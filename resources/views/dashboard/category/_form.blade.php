@csrf
<div class="form-control">
    <label for="">Título</label>
    <input type="text" name="title" id="" value="{{old('title',$category->title)}}">
</div>
<div class="form-control">
    <label for="">Slug</label>
    <input type="text" name="slug" id="" value="{{old('slug',$category->slug)}}">
</div>

<button class="btn btn-success mt-3" type="submit">Enviar</button>