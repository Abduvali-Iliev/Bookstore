<div class="card mb-4">
    <div class="card-header">
        Автор:
        <string class="text-primary">{{$comment->user->name}}</string>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>{{$comment->body}}</p>
            <footer class="blockquote-footer d-block">Оценка
                <cite title="Source Title">{{$comment->score}}</cite>
            </footer>
        </blockquote>
    </div>
</div>


