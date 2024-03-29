<x-layout>
    <x-slot name="title">
        {{ $post->title }} -  My BBS
    </x-slot>

    <div class="back-link">
            &laquo; <a href="{{ route('posts.index') }}">back</a>
        </div>
        <h1>
            <span>{{ $post->title }}</span>
            <a href="{{ route('posts.edit', $post) }}">[Edit]</a>
            <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
                @method('DELETE')
                @csrf

                <button class="btn">[×]</button>
            </form>
        </h1>
        <p>{!! nl2br(e($post->body)) !!}</p>

        <script>
            'use strict';

            {
                document.getElementById('delete_post').addEventListener('submit', e => {
                    e.preventDefault();

                    if (!confirm('Sure to delete?')) {
                        return;
                    }

                    e.target.submit();

                });
            }
        </script>
</x-layout>
