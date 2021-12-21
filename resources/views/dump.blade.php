{{-- add que --}}
<script>
    $(function() {

        function E(e) {
            var t = $(e.parents(".question"));
            t.toggleClass("edit-quesiton"), t.toggleClass("view-quesiton");
            var a = t.find(".question-collapse");
            a.hasClass("show") || (a.collapse("toggle"), t.find(".rotate-icon-click").toggleClass("rotate"));
        }



        function rerun() {

            // $(document).on("click", ".question .view-button", function() {
            //     E($(this));
            // })
            // $(document).on("click", ".question .edit-button", function() {
            //     E($(this));
            // })
            $(document).on("click", ".rotate-icon-click", function() {
                $(this).toggleClass("rotate");
            })
        }



        $('.add-que').click(function() {

            $question_card = $('<div/>')
                .append(
                    $('<div/>').addClass('card question d-flex mb-4 edit-quesiton pt-4')
                    .append(
                        // $('<div/>').addClass('d-flex flex-grow-1 min-width-zero')
                        // .append(
                        //     $('<div/>').addClass(
                        //         'card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center'
                        //     )
                        //     .append(
                        //         $('<div/>').addClass(
                        //             'list-item-heading mb-0 truncate w-80 mb-1 mt-1'
                        //         ) //append question as text value
                        //         .append(
                        //             $('<span/>').addClass('heading-number d-inline-block'),

                        //         )
                        //     ),
                        //     $('<div/>').addClass(
                        //         'custom-control custom-checkbox pl-1 align-self-center pr-4')
                        //     .append(
                        //         $('<button/>').addClass(
                        //             'btn btn-outline-theme-3 icon-button edit-button')
                        //         .append(
                        //             $('<i/>').addClass('simple-icon-pencil')
                        //         ),

                        //         $('<button/>').addClass(
                        //             'btn btn-outline-theme-3 icon-button view-button')
                        //         .append(
                        //             $('<i/>').addClass('simple-icon-eye')
                        //         ),

                        //         $('<button/>').attr({
                        //             'class': 'btn btn-outline-theme-3 icon-button rotate-icon-click rotate',
                        //             'type': 'button',
                        //             'data-toggle': 'collapse',
                        //             'data-target': '#q34', //question id
                        //             'aria-expanded': 'true',
                        //             'aria-controls': 'q34' //question id
                        //         })
                        //         .append(
                        //             $('<i/>').addClass('simple-icon-arrow-down with-rotate-icon')
                        //         )

                        //     )
                        // ),
                        $('<div/>').attr({
                            'class': 'question-collapse collapse show',
                            'id': 'q34' //question id
                        }).append(
                            $('<div/>').addClass('card-body pt-0')
                            .append(
                                $('<div/>').addClass('edit-mode')
                                .append(
                                    $('<div/>').addClass('form-group mb-5')
                                    .append(
                                        $('<label> Question </label>'),
                                        $('<input/>').attr({
                                            'class': 'form-control',
                                            'text': 'text',
                                            'placeholder': 'enter new question here'
                                        })
                                    ),
                                    $('<div/>').addClass('separator mb-4'),
                                    $('<div/>').addClass('form-group')
                                    .append(
                                        $('<label/>').text('Answer Type').addClass('d-block'),
                                        $('<select/>').attr({
                                            'class': 'form-control select2-single',
                                            'data-width': '100%'
                                        }).append(
                                            $('<option/>').text('').attr({
                                                // 'label': '&nbsp;'
                                            }),
                                            $('<option/>').text('Text Input').attr({
                                                'value': '0'
                                            }),
                                            $('<option/>').text('Single Select').attr({
                                                'value': '1'
                                            }),
                                            $('<option/>').text('Multiple Select').attr({
                                                'value': '2'
                                            }),
                                            $('<option/>').text('Checkbox').attr({
                                                'value': '3'
                                            }),
                                            $('<option/>').text('Radiobutton').attr({
                                                'value': '4'
                                            }),
                                        )
                                    ),
                                    $('<div/>').addClass('form-group')
                                    .append(
                                        $('<label/>').text('Answers').addClass('d-block'),
                                        $('<div/>').addClass('answers mb-3 sortable'),
                                        $('<div/>').addClass('text-center')
                                        .append(
                                            $('<button/>').addClass(
                                                'btn btn-outline-primary btn-sm mb-2 ans-btn')
                                            .append(
                                                $('<i/>').text('Add Answer').attr({
                                                    'class': 'simple-icon-plus btn-group-icon',
                                                    'type': 'button'
                                                })
                                            )
                                        )
                                    )
                                ),
                                $('<div/>').addClass('view-mode')
                                .append(
                                    $('<label class"d-block"> Answer </label>'),
                                    $('<div/>').addClass('answers mb-3 sortable'),
                                    $('<div/>').addClass('text-center')
                                    .append(
                                        $('<button/>').text('Add Answer').attr({
                                            'type': 'button',
                                            'class': 'btn btn-outline-primary btn-sm mb-2 ans-btn'
                                        }).append(
                                            $('<i/>').addClass('simple-icon-plus btn-group-icon')
                                        )
                                    )
                                )
                            )
                        )
                    )
                );


            $('.sortable-survey').append($question_card);


            console.log($('.sortable-survey .question'))

            rerun()

            $('.question').on('click', '.ans-btn', function(e) {

                var ansBox = $('<div/>').addClass('mb-1 position-relative')
                    .append(
                        $('<input>').attr({
                            'class': 'form-control',
                            'type': 'text',
                        }),

                        $('<div/>').addClass('input-icons')
                        .append(
                            $('<span/>').addClass('badge badge-pill handle pr-0 mr-0')
                            .append(
                                $('<i/>').addClass('simple-icon-cursor-move')
                            ),

                            $('<span/>').addClass('badge badge-pill del-ans btn')
                            .append(
                                $('<i/>').addClass('simple-icon-ban')
                            )
                        )
                    )


                $(this).parent().parent().children('.answers').append(ansBox)
            })



        })


        // $('.add-que').click(function() {
        //     $question_card = $('<div/>')
        //         .append(
        //             $('<div/>').addClass('card question d-flex mb-4 edit-quesiton')
        //             .append(
        //                 $('<div/>').addClass('d-flex flex-grow-1 min-width-zero')
        //                 .append(
        //                     $('<div/>').addClass(
        //                         'card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center'
        //                     )
        //                     .append(
        //                         $('<div/>').addClass(
        //                             'list-item-heading mb-0 truncate w-80 mb-1 mt-1'
        //                         ) //append question as text value
        //                         .append(
        //                             $('<span/>').addClass('heading-number d-inline-block'),

        //                         )
        //                     ),
        //                     $('<div/>').addClass(
        //                         'custom-control custom-checkbox pl-1 align-self-center pr-4')
        //                     .append(
        //                         $('<button/>').addClass(
        //                             'btn btn-outline-theme-3 icon-button edit-button')
        //                         .append(
        //                             $('<i/>').addClass('simple-icon-pencil')
        //                         ),

        //                         $('<button/>').addClass(
        //                             'btn btn-outline-theme-3 icon-button view-button')
        //                         .append(
        //                             $('<i/>').addClass('simple-icon-eye')
        //                         ),

        //                         $('<button/>').attr({
        //                             'class': 'btn btn-outline-theme-3 icon-button rotate-icon-click rotate',
        //                             'type': 'button',
        //                             'data-toggle': 'collapse',
        //                             'data-target': '#34', //question id
        //                             'aria-expanded': 'true',
        //                             'aria-controls': '34' //question id
        //                         })
        //                         .append(
        //                             $('<i/>').addClass('simple-icon-arrow-down with-rotate-icon')
        //                         )

        //                     )
        //                 ),
        //                 $('<div/>').attr({
        //                     'class': 'question-collapse collapse show',
        //                     'id': '34' //question id
        //                 }).append(
        //                     $('<div/>').addClass('card-body pt-0')
        //                     .append(
        //                         $('<div/>').addClass('edit-mode')
        //                         .append(
        //                             $('<div/>').addClass('form-group mb-5')
        //                             .append(
        //                                 $('<label> Question </label>'),
        //                                 $('<input/>').attr({
        //                                     'class': 'form-control',
        //                                     'text': 'text',
        //                                     'placeholder': 'enter new question here'
        //                                 })
        //                             ),
        //                             $('<div/>').addClass('separator mb-4'),
        //                             $('<div/>').addClass('form-group')
        //                             .append(
        //                                 $('<label/>').text('Answer Type').addClass('d-block'),
        //                                 $('<select/>').attr({
        //                                     'class': 'form-control select2-single',
        //                                     'data-width': '100%'
        //                                 }).append(
        //                                     $('<option/>').text('').attr({
        //                                         // 'label': '&nbsp;'
        //                                     }),
        //                                     $('<option/>').text('Text Input').attr({
        //                                         'value': '0'
        //                                     }),
        //                                     $('<option/>').text('Single Select').attr({
        //                                         'value': '1'
        //                                     }),
        //                                     $('<option/>').text('Multiple Select').attr({
        //                                         'value': '2'
        //                                     }),
        //                                     $('<option/>').text('Checkbox').attr({
        //                                         'value': '3'
        //                                     }),
        //                                     $('<option/>').text('Radiobutton').attr({
        //                                         'value': '4'
        //                                     }),
        //                                 )
        //                             ),
        //                             $('<div/>').addClass('form-group')
        //                             .append(
        //                                 $('<label/>').text('Answers').addClass('d-block'),
        //                                 $('<div/>').addClass('answers mb-3 sortable'),
        //                                 $('<div/>').addClass('text-center')
        //                                 .append(
        //                                     $('<button/>').addClass(
        //                                         'btn btn-outline-primary btn-sm mb-2 ans-btn')
        //                                     .append(
        //                                         $('<i/>').text('Add Answer').attr({
        //                                             'class': 'simple-icon-plus btn-group-icon',
        //                                             'type': 'button'
        //                                         })
        //                                     )
        //                                 )
        //                             )
        //                         ),
        //                         $('<div/>').addClass('view-mode')
        //                         .append(
        //                             $('<label class"d-block"> Answer </label>'),
        //                             $('<div/>').addClass('answers mb-3 sortable'),
        //                             $('<div/>').addClass('text-center')
        //                             .append(
        //                                 $('<button/>').text('Add Answer').attr({
        //                                     'type': 'button',
        //                                     'class': 'btn btn-outline-primary btn-sm mb-2 ans-btn'
        //                                 }).append(
        //                                     $('<i/>').addClass('simple-icon-plus btn-group-icon')
        //                                 )
        //                             )
        //                         )
        //                     )
        //                 )
        //             )




        //         )

        //     $(this).parent().parent().children('.sortable-survey').append($question_card)

        // })
    })
</script>