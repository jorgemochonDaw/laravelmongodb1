@csrf<!-- token de proteccion -->
<label for="title">Título</label>
<input name="title" id="title" type="text" class="form-control" value="{{ old('title', $libro->title) }}">

<label for="age">Año</label>
<input name="age" id="age" type="numeric" class="form-control" value="{{ old('age', $libro->age) }}">

<select name="category_id" id="category_id">
    @foreach($categorias as $title => $id)
    <option value="{{$id}}">{{$title}}</option>
    @endforeach
</select>
<label for="description">Descripción</label>

<textarea id="description" name="description" class="form-control">
{{ old('description', $libro->description) }}
</textarea>
