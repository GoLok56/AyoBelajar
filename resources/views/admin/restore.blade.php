<div class="flex column">

@include('templates.header')
    <style> 
    label { min-width:75px; }
    main { align-items: center; }
    main > form { margin: auto; }
    main > form > * { margin-top: 8px; }
    main > form > input { padding: 8px; }
    main > form > input:hover { cursor: pointer; }
    a { font-size: 0.75em; }
    </style>
    

    <main class="flex column flex-1">
        {{ csrf_field() }}
        {{ Form::open(['url' => '/admin/restore', 'class' => 'flex column']) }}
            <div class="flex row">
                {{ Form::label('restore', 'Backup File') }}
                {{ Form::file('restore') }}
            </div>
            <input type="submit" value="Restore" class="primary-background">
        {{ Form::close() }}
    </main>

@include('templates.footer')

</div>