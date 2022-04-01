@csrf
<div class="form-control">
    <label for="">Título</label>
    <input type="text" class="form-control" name="title" id="" value="{{old('title',$post->title)}}">
</div>

<div class="form-control">
    <label for="">Slug</label>
    <input type="text" class="form-control" name="slug" id="" value="{{old('slug',$post->slug)}}">
</div>

<div class="form-control">
    <label for="">Categoria</label>
    <select name="category_id" id="" class="form-control">
        <option value=""></option>
        @foreach ($categories as $title => $id)
            <option {{old('category_id',$post->category_id) == $id ? 'selected' : ''}} value="{{$id}}">{{$title}}</option>
        @endforeach
    </select>
</div>

<div class="form-control">
    <label for="">Posteado</label>
    <select name="posted" id="" class="form-control">
        <option value=""></option>
        <option {{old('posted',$post->posted) == 'not' ? 'selected' : ''}} value="not">No</option>
        <option {{old('posted',$post->posted) == 'yes' ? 'selected' : ''}} value="yes">Sí</option>
    </select>
</div>
<div class="form-control"><div class="form-control">
    <label for="">Contenido</label>
    <textarea class="form-control" name="content" >{{old('content',$post->content)}}</textarea>
</div>
<div class="form-control">
    <label for="">Descripción</label>
    <textarea class="form-control" name="description">{{old('description',$post->description)}}</textarea>
</div>

@if(isset($task) && $task == 'edit')
    <div class="form-control">
        <label for="">Image</label>
        <input type="file" name="image">
    </div>
@endif

<button class="btn btn-success mt-3" type="submit">Enviar</button>