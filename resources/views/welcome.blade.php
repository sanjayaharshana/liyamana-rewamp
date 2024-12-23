<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Build an online word processor with TinyMCE</title>


</head>
<body>
<!-- partial:index.partial.html -->
<textarea id="mytextarea" rows="100%">
  <h2>Down the Rabbit-Hole</h2>
  <p>Alice was beginning to get very tired of sitting by her sister on the bank, and of having nothing to do: once or twice she had peeped into the book her sister was reading, but it had no pictures or conversations in it, “and what is the use of a book,” thought Alice “without pictures or conversations?”</p>
  <p>So she was considering in her own mind (as well as she could, for the hot day made her feel very sleepy and stupid), whether the pleasure of making a daisy-chain would be worth the trouble of getting up and picking the daisies, when suddenly a White Rabbit with pink eyes ran close by her.</p>
</textarea>
<!-- partial -->
<script src='https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/6/tinymce.min.js'></script>

<script>
    tinymce.init({
        selector: "#mytextarea",
        plugins: "powerpaste searchreplace autolink print link image lists advlist table charmap pagebreak tinymcespellchecker wordcount wordcount autosave",
        toolbar: "undo redo print | styleselect | fontselect fontsizeselect fontfamily bold italics underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify |lineheight | numlist bullist indent outdent | removeformat | spellcheckdialog",
        content_style: `
              body {
                  background: #fff;
                }
              @media (min-width: 840px) {
                  html {
                     background: #eceef4;
                     min-height: 100%;
                     padding: 0 .5rem
                    }
                  body {
                     margin: 1rem auto 0;
                     max-width: 820px;
                     min-height: calc(100vh - 1rem);
                     padding:4rem 6rem 6rem 6rem
                    }
                }
            `,
        skin: "material-outline",
        icons: "material",
        autosave_restore_when_empty: true

    });
</script>

</body>
</html>
