<script type="text/javascript" src="./node_modules/dompurify/dist/purify.min.js"></script>
<script type="text/javascript" src="./node_modules/marked/marked.min.js"></script>
<script type="text/javascript">
    let posts = document.getElementsByClassName('post-content');
    
    Array.from(posts).forEach(post => {
        const comment = post.innerHTML;
        const cleanComment = DOMPurify.sanitize(comment)
        post.innerHTML = marked(cleanComment);
    });
</script>