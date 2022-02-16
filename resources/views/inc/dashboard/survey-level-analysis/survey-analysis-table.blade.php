 <style>
     .alyt-table{
         margin-top: 15px;
     }
     .alyt-table td{
         border: 1px solid gray;
     }
     .t-head{
         background-color: #00365a;
         color: white;
         border-top-left-radius: 5px;
         border-bottom-left-radius: 5px;
     }
     .table-scroll {
        height: 70vh;
        overflow-x: auto;
        overflow-y: auto;
    }
 </style>
 
 {{-- Table --}}
        <div class=" mt-5 mb-4">
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <!-- <input type="text" class="cd-search table-filter" data-table="order-table" placeholder="Item to filter.." /> -->
                        {{-- Search Bar --}}
                        <div class="d-flex">
                            <div class="input-group">
                            <input type="text" class="form-control col-lg-4 table-filter" data-table="search-table" aria-label="Text input with search button" placeholder="Search Here..........................">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="iconsminds-magnifi-glass"></i> Search</button>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox pl-1 align-self-center pr-4">
                            <button class="btn btn-outline-theme-3 icon-button" data-toggle="dropdown">
                                <i class="iconsminds-files"></i>
                            </button> 
                                 <div class="dropdown-menu">
                                    <!-- <a class="dropdown-item" href="#">Name/E-mail/Contact</a> 
                                    <a class="dropdown-item" href="#">Year Group</a> 
                                    <a class="dropdown-item" href="#">Department</a>
                                    <div role="separator" class="dropdown-divider"></div> -->
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="padding-left:20px">Download</a>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item">excel file</a>
                                        <a href="#" class="dropdown-item">csv file</a>
                                    </div>
                                </div>
                        </div>
                        </div>
                        <div class="table-scroll">
                            <table class="alyt-table search-table table table-hover">
                                <thead class="t-head">
                                <tr>
                                    <th class="col-1">#</th>
                                    <th class="col-5">Questions</th>
                                    <th class="col-6">Responses</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>admin@codehim.com Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur, obcaecati eveniet eligendi molestiae ut, repudiandae tempore facilis blanditiis mollitia totam iusto minima porro in, beatae magni amet aut modi quod.</td>
                                    <td>0123456789</td>
                                    
                                </tr>

                                <tr>
                                    <td>1</td>
                                    <td>hello@codehim.com</td>
                                    <td>9876543210</td>
                                    
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>maria@example.com</td>
                                    <td>6754328901</td>
                                
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>zee@example.com</td>
                                    <td>6754328901</td>
                                    
                                </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


<script>
    (function() {
    'use strict';

    var TableFilter = (function() {
    var Arr = Array.prototype;
    var input;

    function onInputEvent(e) {
    input = e.target;
    var table1 = document.getElementsByClassName(input.getAttribute('data-table'));
    Arr.forEach.call(table1, function(table) {
    Arr.forEach.call(table.tBodies, function(tbody) {
    Arr.forEach.call(tbody.rows, filter);
    });
    });
    }

    function filter(row) {
    var text = row.textContent.toLowerCase();
    //console.log(text);
    var val = input.value.toLowerCase();
    //console.log(val);
    row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }

    return {
    init: function() {
    var inputs = document.getElementsByClassName('table-filter');
    Arr.forEach.call(inputs, function(input) {
    input.oninput = onInputEvent;
    });
    }
    };

    })();

    /*console.log(document.readyState);
    document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
    console.log(document.readyState);
    TableFilter.init();
    }
    }); */

    TableFilter.init(); 
    })();
</script>
        
            
       