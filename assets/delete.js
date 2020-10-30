const post = document.getElementById('posts');

if(post) {
    post.addEventListener('click', e => {
        if(e.target.className === 'btn btn-danger post-delete') {
            if(confirm('Delete?')) {
                const id = e.target.getAttribute('data-id');
             fetch('/post/delete/' + id, {
                 method: 'DELETE'
             }).then(res => window.location.reload());
               console.log(id);
            }
        }
    });
}