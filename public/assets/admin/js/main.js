let links = document.getElementById("aside");

try {
    tinymce.init({
        selector: "textarea.tiny",
        table_grid: false,
        resize_img_proportional: false,

        image_advtab: true,

        image_description: false,

        height: 500,
        directionality: "rtl",

        language: "en",

        grid_preset: "Bootstrap5",
        mobile: {
            menubar: true,
        },

        fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 24px 36px",

        plugins:
            "preview  grid code  importcss  searchreplace autolink autosave save directionality  visualblocks visualchars fullscreen image link media  template codesample table charmap pagebreak nonbreaking anchor  insertdatetime advlist lists  wordcount   help   charmap    emoticons ",
        toolbar1:
            " undo redo grid_insert  | fontsizeselect |code  fullscreen bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor emoticons | preview",
        file_picker_callback(callback, value, meta) {
            let x =
                window.innerWidth ||
                document.documentElement.clientWidth ||
                document.getElementsByTagName("body")[0].clientWidth;
            let y =
                window.innerHeight ||
                document.documentElement.clientHeight ||
                document.getElementsByTagName("body")[0].clientHeight;
            tinymce.activeEditor.windowManager.openUrl({
                url: "/file-manager/tinymce5",
                title: "Laravel File manager",
                width: x * 0.8,
                height: y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content, { text: message.text });
                },
            });
        },
    });
    tippy("[data-tippy-content]");
} catch (error) {}

$("#menu").click(function () {
    $(".layout").addClass("layout-show");
    links.classList.add("ul-show");
});

$(".layout").click(function () {
    links.classList.remove("ul-show");
    $("#search").removeClass("searchShow");
    $(".layout").removeClass("d-block");

    $(".layout").removeClass("layout-show");
});

function changeColor(colorName) {
    let color;
    let xbuttonBorder;
    let xbuttonBackground;

    if (colorName == "عنبري") {
        color = "rgb(245 158 11 /1)";
        xbuttonBorder = "rgb(180 83 9 /1)";
        xbuttonBackground = "rgb(245 158 11 /1)";
    } else if (colorName == "أزرق") {
        color = "rgb(59 130 246 /1)";
        xbuttonBorder = "rgb(29 78 216  /1)";
        xbuttonBackground = "rgb(59 130 246 /1)";
    } else if (colorName == "بنفسجي") {
        color = "rgb(79, 70, 156)";
        xbuttonBorder = "#2e238d";
        xbuttonBackground = "#4F469C";
    } else if (colorName == "سماوي مفتح") {
        color = "rgb(14 116 144 /1)";
        xbuttonBorder = "rgb(14 116 144 /1)";
        xbuttonBackground = "rgb(6 182 212 /1)";
    } else if (colorName == "زمردي") {
        color = "rgb(16 185 129 /1)";
        xbuttonBorder = "rgb(4 120 87  /1)";
        xbuttonBackground = "rgb(16 185 129 /1)";
    } else if (colorName == "رمادي") {
        color = "rgb(107 114 128/1)";
        xbuttonBorder = "rgb(55 65 81   /1)";
        xbuttonBackground = "rgb(107 114 128/1)";
    } else if (colorName == "زهري") {
        color = "rgb(236 72 153 /1)";
        xbuttonBorder = "rgb(190 24 93 /1)";
        xbuttonBackground = "rgb(236 72 153/1)";
    } else if (colorName == "أرجواني") {
        color = "rgb(168 85 247 /1)";
        xbuttonBorder = "rgb(126 34 206  /1)";
        xbuttonBackground = "rgb(168 85 247/1)";
    } else if (colorName == "احمر") {
        color = "rgb(239 68 68 /1)";
        xbuttonBorder = "rgb(185 28 28 /1)";
        xbuttonBackground = "rgb(239 68 68 /1)";
    } else if (colorName == "أخضر") {
        color = "rgb(34 197 94 /1)";
        xbuttonBorder = "rgb(21 128 61 /1)";
        xbuttonBackground = "rgb(34 197 94 /1)";
    } else if (colorName == "ليمي") {
        color = "rgb(132 204 22 /1)";
        xbuttonBorder = "rgb(77 124 15 /1)";
        xbuttonBackground = "rgb(132 204 22 /1)";
    } else if (colorName == "برتقالي") {
        color = "rgb(249 115 22 /1)";
        xbuttonBorder = "rgb(194 65 12/1)";
        xbuttonBackground = "rgb(249 115 22/1)";
    } else if (colorName == "سماوي") {
        color = "rgb(14 165 233 /1)";
        xbuttonBorder = "rgb(3 105 161/1)";
        xbuttonBackground = "rgb(14 165 233/1)";
    } else if (colorName == "شرشيري") {
        color = "rgb(20 184 166 /1)";
        xbuttonBorder = "rgb(15 118 110/1)";
        xbuttonBackground = "rgb(20 184 166/1)";
    } else if (colorName == "أصفر") {
        color = "rgb(234 179 8 /1)";
        xbuttonBorder = "rgb(161 98 7/1)";
        xbuttonBackground = "rgb(234 179 8 /1)";
    }

    let rootStyles = document.documentElement.style;
    rootStyles.setProperty("--mainColor", `${color}`);
    localStorage.setItem("color", `${color}`);

    rootStyles.setProperty("--xbutton-border", `${xbuttonBorder}`);
    localStorage.setItem("xbuttonBorder", `${xbuttonBorder}`);

    rootStyles.setProperty("--xbutton-background", `${xbuttonBackground}`);
    localStorage.setItem("xbuttonBackground", `${xbuttonBackground}`);
}

function toggleColors() {
    let colors = document.getElementById("colors");
    colors.classList.toggle("colorsShow");
}

function toggleColors() {
    let colors = document.getElementById("colors");
    colors.classList.toggle("colorsShow");
}

const toolbarOptions = [
    [
        {
            header: 1,
        },
        {
            header: 2,
        },
    ],
    ["bold", "italic", "underline", "strike", "clean"],
    [
        {
            align: "",
        },
        {
            align: "center",
        },
        {
            align: "right",
        },
        {
            align: "justify",
        },
    ],
    [
        {
            list: "ordered",
        },
        {
            list: "bullet",
        },
    ],
    ["link"],
    [
        {
            color: [],
        },
        {
            background: [],
        },
    ],
];

let quills = document.getElementsByClassName("quill");

for (let i = 0; i < quills.length; i++) {
    var quill = new Quill(quills[i], {
        theme: "snow",

        modules: {
            toolbar: toolbarOptions,
        },
        formats: [
            "bold",
            "align",
            "italic",
            "underline",
            "strike",
            "header",
            "link",
            "list",
            "color",
            "background",
        ],
    });

    quill.format("font", "cairo");
    quill.format("align", "right");
}

function validate(the_form = "theForm") {
    // let inputs = document.getElementsByClassName("checkThis");
    let inputs = document.querySelectorAll("#" + the_form + " .checkThis");

    console.log(inputs);

    for (const input of inputs) {
        if ($(input).val() == "") {
            const instance = tippy(input);

            instance.setContent("الحقل ده مطلوب");

            console.error(input);

            $([document.documentElement, document.body]).animate(
                {
                    scrollTop: $(input).offset().top - 120,
                },
                0,
            );

            instance.show();

            setTimeout(() => {
                instance.destroy();
            }, 3000);

            return;
        }
    }




    if ($("#hiddenArea")) {
        let value = $(".quill-container .ql-editor").html();
        $("#hiddenArea").val(value);
    }


    document.getElementById(the_form).submit();
}

window.onscroll = function () {
    localStorage.setItem("scrollPosition", window.scrollY);
};

// استرجاع وضع الإسكرول والتمرير إلى المكان المحفوظ
window.addEventListener("DOMContentLoaded", function () {
    if ($(".pagnate")) {
        return;
    }

    const scrollPosition = localStorage.getItem("scrollPosition");
    if (scrollPosition !== null) {
        window.scrollTo(0, scrollPosition);
        localStorage.removeItem("scrollPosition"); // حذف القيمة بمجرد استخدامها
    }
});

function show_search_filters() {
    let search = document.getElementById("search");
    $(".layout").addClass("layout-show");
    $(".layout").addClass("d-block");
    search.classList.add("searchShow");
}

$("#searchBtnClose").click(function () {
    $("#search").removeClass("searchShow");
    $(".layout").removeClass("layout-show");
    $(".layout").removeClass("d-block");
});

try {
    document.getElementById("resetBtn").addEventListener("click", function () {
        var originalURL = window.location.href.split("search")[0];

        history.replaceState({}, document.title, originalURL);

        window.location.href = originalURL;
    });
} catch (error) {}

try {
    toastr.options = {
        closeButton: false,
        debug: false,
        newestOnTop: false,
        progressBar: false,
        positionClass: "toast-bottom-right",
        preventDuplicates: false,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "2000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
} catch (error) {}


