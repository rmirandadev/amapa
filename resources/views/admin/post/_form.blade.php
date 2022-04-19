<div class="row">
    <div class="col-md-6 form-group">
        {!! Form::label('category_id', 'Categoria'); !!}
        {!! Form::select('category_id',$categories,null,['class'=>'form-control select2', 'id'=>'category_id', 'placeholder' => 'Selecione uma categoria'])!!}
        @error('category_id')
        <small class="form-text text-danger">{{ $errors->first('category_id') }}</small>
        @enderror
    </div>
    <div class="col-md-6 form-group">
        {!! Form::label('subcategory_id', 'Subcategoria'); !!}
        {!! Form::select('subcategory_id',$subcategories, $category->subcategory_id ?? null, ['placeholder' => 'Selecione uma categoria primeiro','class'=>'form-control select2','id'=>'subcategory_id']); !!}
        @error('subcategory_id')
        <small class="form-text text-danger">{{ $errors->first('subcategory_id') }}</small>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        {!! Form::label('topic_id', 'Tópico'); !!}
        {!! Form::select('topic_id',$topics,null,['class'=>'form-control select2', 'id'=>'topic_id', 'placeholder' => 'Selecione um tópico'])!!}
        @error('topic_id')
        <small class="form-text text-danger">{{ $errors->first('topic_id') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('title', 'Título'); !!}
        {!! Form::text('title',null,['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' )]) !!}
        @error('title')
        <small class="form-text text-danger">{{ $errors->first('title') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('subtitle', 'Subtítulo'); !!}
        {!! Form::text('subtitle',null,['class' => 'form-control' . ( $errors->has('subtitle') ? ' is-invalid' : '' )]) !!}
        @error('subtitle')
        <small class="form-text text-danger">{{ $errors->first('subtitle') }}</small>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        {!! Form::label('publication_date', 'Data de publicação'); !!}
        {!! Form::date('publication_date',null,['class' => 'form-control' . ( $errors->has('publication_date') ? ' is-invalid' : '' )]) !!}
        @error('publication_date')
        <small class="form-text text-danger">{{ $errors->first('publication_date') }}</small>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        {!! Form::label('status', 'Status da notícia'); !!}
        {!! Form::select('status', \App\Models\Post::STATUS, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('status')
        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
        @enderror
    </div>

    <div class="col-md-4 mb-3">
        {!! Form::label('highlight', 'Destaque na página'); !!}
        {!! Form::select('highlight', \App\Models\Post::HIGHTLIGHT, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('highlight')
        <small class="form-text text-danger">{{ $errors->first('highlight') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('image', 'Imagem - Largura 600px'); !!}
        <div class="custom-file">
            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
            {!! Form::label('image', 'Selecione uma foto',['class' => 'custom-file-label']); !!}
            @error('image')
            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        {!! Form::label('image_legend', 'Legenda para a imagem'); !!}
        {!! Form::text('image_legend',null,['class' => 'form-control' . ( $errors->has('image_legend') ? ' is-invalid' : '' )]) !!}
        @error('image_legend')
        <small class="form-text text-danger">{{ $errors->first('image_legend') }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        {!! Form::label('image_photographer', 'Fotografo'); !!}
        {!! Form::text('image_photographer',null,['class' => 'form-control' . ( $errors->has('image_photographer') ? ' is-invalid' : '' )]) !!}
        @error('image_photographer')
        <small class="form-text text-danger">{{ $errors->first('image_photographer') }}</small>
        @enderror
    </div>

    <div class="col-sm-12 mb-3">
        {!! Form::label('text', 'Texto'); !!}
        {!! Form::textarea('text',null,['class' => 'form-control', 'rows' => '5', 'name' => 'text']) !!}
        @error('text')
        <small class="form-text text-danger">{{ $errors->first('text') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('user_id', 'Assessores'); !!}
        {!! Form::select('user_id[]', $users, $post->users ?? null,['multiple' => true, 'class' => 'form-control form-group select2']); !!}
        @error('user_id')
        <small class="form-text text-danger">{{ $errors->first('user_id') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('company_id', 'Víncular notícia nos portais'); !!}
        {!! Form::select('company_id[]', $companies, $post->companies ?? null,['multiple' => true, 'class' => 'form-control form-group select2']); !!}
        @error('company_id')
        <small class="form-text text-danger">{{ $errors->first('company_id') }}</small>
        @enderror
    </div>
    @role('Administrador|Editor')
        <div class="col-md-4 mb-3">
            {!! Form::label('finished', 'Finalizada'); !!}
            {!! Form::select('finished', \App\Models\Post::FINISHED, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
            @error('finished')
            <small class="form-text text-danger">{{ $errors->first('finished') }}</small>
            @enderror
        </div>
    @endrole

</div>
