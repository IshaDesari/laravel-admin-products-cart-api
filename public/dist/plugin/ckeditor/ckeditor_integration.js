$(document).ready(function() {
    $('.ckeditor').ckeditor();
});

CKEDITOR.replace('description', {
    filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
    filebrowserUploadMethod: 'form',
    imageRemoveEvent: "",

    // removePlugins: 'blockquote,save,flash,iframe,tabletools,pagebreak,templates,about,showblocks,newpage,language,print,div',
    // removeButtons: 'Print,Form,TextField,Textarea,Button,CreateDiv,PasteText,PasteFromWord,Select,HiddenField,Radio,Checkbox,ImageButton,Anchor,BidiLtr,BidiRtl,Font,Format,Styles,Preview,Indent,Outdent',
    removeButtons: 'Save,NewPage,ExportPdf,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,About',

    toolbarGroups: [
        { name: 'document',     groups: ['mode', 'document', 'doctools'] },
        { name: 'clipboard',    groups: ['clipboard', 'undo'] },
        { name: 'editing',      groups: ['find', 'selection', 'spellchecker', 'editing'] },
        { name: 'forms',        groups: ['forms'] },
        { name: 'paragraph',    groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph'] },
        { name: 'links',        groups: ['links'] },
        { name: 'tools',        groups: ['tools'] },
        { name: 'basicstyles',  groups: ['basicstyles', 'cleanup'] },
        { name: 'styles',       groups: ['styles'] },
        { name: 'colors',       groups: ['colors'] },
        { name: 'insert',       groups: ['insert'] },
        { name: 'others',       groups: ['others'] },
        { name: 'about',        groups: ['about'] },
    ],
});
