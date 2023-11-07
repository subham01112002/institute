<?php
include("conn.php");
$req=" SELECT * FROM  `subject_category` ORDER BY `Category_id`";
    $qut=mysqli_query($conn,$req);

    $rem=" SELECT * FROM  `subject_group`  ORDER BY `Subject_group_id`";
    $que=mysqli_query($conn,$rem);
    
    $ren=" SELECT * FROM  `subject_master`  ORDER BY `Subject_id`";
    $quy=mysqli_query($conn,$ren);
    if(!empty($_REQUEST['mode']))
    {
        $res_category_id=$_REQUEST['Category_id'];
        $res_grp_id=$_REQUEST['Subject_group_id'];
        $res_sub_id=$_REQUEST['Subject_id'];
        
        $sql=mysqli_query($conn,"SELECT * FROM `student_activity` INNER JOIN `student_registration` ON  student_registration.`Student_id`=student_activity.`Student_id` WHERE `Category_id`='$res_category_id' AND Subject_group_id='$res_grp_id' AND Subject_id='$res_sub_id'");
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="student_act.css" >
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <style>
        /*
	Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
	*/

  body {
    counter-reset: my-sec-counter;
    font-family: 'Open Sans', sans-serif;
    font-size: 12px;
    background: rgb(238,174,202);
  background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,178,233,1) 100%);
  /*background: rgb(34,193,195);
background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(231,241,230,1) 100%, rgba(224,239,229,1) 100%);*/
  margin-top: 95px;
  }
  .form-box {
    max-width: 800px;
    
    margin: auto;
    padding: 50px;
    background: #ffffff;
    border: 10px solid #f2f2f2;
    
  
  }
  .form-group{
    margin-bottom: 5px;
    font-family:  sans-serif;
  }
  
  h1  {
    text-align: center;
    font-family:Arial, Helvetica, sans-serif;
  font:
    2em "typewriter",
    monospace;
  align-self: center;
    
  
  }
  #DataTable {
    position:relative;
    padding: 15px;
    box-sizing: border-box;
  }
  
  table { 
    width: 100%; 
    border-collapse: collapse; 
  }
  
  th { 
    background: #333; 
    color: white; 
    font-weight: bold; 
    cursor: cell;
  }
  td, th { 
    padding: 6px; 
    border: 1px solid #ccc; 
    text-align: left; 
    box-sizing: border-box;
  }
  
  tr:nth-of-type(odd) { 
    background: #eee; 
  }
  
    @media
      only screen 
      and (max-width: 760px), (min-device-width: 768px) 
      and (max-device-width: 1024px)  {
  
        table {
          margin-top: 106px;
        }
      /* Force table to not be like tables anymore */
      table, thead, tbody, th, td, tr {
        display: block;
      }
  
      /* Hide table headers (but not display: none;, for accessibility) */
      thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
      }
  
      tr {
        margin: 0 0 1rem 0;
        overflow: auto;
        border-bottom: 1px solid #ccc;
      }
        
        
        
        tbody tr:before {
          counter-increment: my-sec-counter;
          content: "";
          background-color:#333;
          display: block;
          height: 1px;
        }
  
        
      tr:nth-child(odd) {
        background: #ccc;
      }
      
      td {
        /* Behave  like a "row" */
        border: none;
        border-bottom: 1px solid #eee;
        margin-right: 0%;
        display: block;
        border-right: 1px solid #ccc;
        border-left: 1px solid #ccc;
        box-sizing:border-box;
      }
  
      td:before {
        /* Top/left values mimic padding */
        font-weight: bold;
        width: 50%;
        float:left;
        box-sizing:border-box;
        padding-left: 5px;
      }
  
      /*
      Label the data
      You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
      */
      td:nth-of-type(1):before { content: "First Name"; }
      td:nth-of-type(2):before { content: "Last Name"; }
      td:nth-of-type(3):before { content: "Job Title"; }
      td:nth-of-type(4):before { content: "Favorite Color"; }
      td:nth-of-type(5):before { content: "Wars of Trek?"; }
      td:nth-of-type(6):before { content: "Secret Alias"; }
      td:nth-of-type(7):before { content: "Date of Birth"; }
      td:nth-of-type(8):before { content: "Dream Vacation City"; }
      td:nth-of-type(9):before { content: "GPA"; }
      td:nth-of-type(10):before { content: "Arbitrary Data"; }
      
      .box ul.pagination {
        position: relative !important;
        bottom: auto !important;
        right: auto !important;
        width: 100%;
        list-style: none;
      } 
        
      .box {
        text-align: center;
        position: fixed;
        width: 100%;
        background-color: #fff;
        top: 0px;
        left:0px;
        padding: 15px;
        box-sizing: border-box;
        border-bottom: 1px solid #ccc;
      }
        
      .box ul.pagination {
        list-style: none;
    display: flex;
    gap: 15px;
    margin: 0px;
        
      }
        
       .box .dvrecords {
        display: block;
         margin-bottom: 10px;
      }
      .pagination>li {
          display: inline-block;
      }
    }
  
  .top-filters {
    font-size: 0px;
  }
  
  .search-field {
    text-align: right;
    margin-bottom: 5px;
  }
  
  .dd-number-of-recoeds {
    font-size: 12px;
  }
  
  .search-field,
  .dd-number-of-recoeds {
    display: inline-block;
    width: 50%;
  }
  
  .box ul.pagination {
    position: absolute;
    bottom: -45px;
    right: 15px;
    list-style: none;
    display: flex;
    gap: 15px;
  }
  
  .box .dvrecords {
    padding: 5px 0;
  }
  .pagination>li>a {
    text-decoration: none;
    font-size: larger;
}
  
  .box .dvrecords .records{
    margin-right: 5px;
  }
  a {
    color: blueviolet;
  }
    </style>
</head>
<body>
<div class="form-box">
  <h1><a href="index.php"><i class="fa-solid fa-building-columns"></i></a></h1>
  <h1>Student Activity Form</h1>
  
  <form action="" name="paymentform" id="paymentform" method="post" onSubmit="return checking();">
    <input type="hidden" name="mode" value="1" />
    
    <div class="form-group">
      <label for="categoryid">Category Name</label>
      <select class="form-control" name="Category_id" id="Category_id" onchange="subject_groupchk(this.value)" >
									<option value=""> Select Your Category</option>
									<?php while($c=mysqli_fetch_array($qut)){ ?>
									<option value="<?php echo $c['Category_id'] ?>"
                                    <?php if(isset($res_category_id) && $res_category_id==$c['Category_id']) echo "selected" ?>><?php echo $c['Category_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="form-group">
      <label for="categoryid">Subject Group Name</label>
      <select class="form-control" name="Subject_group_id" id="Subject_group_id" onchange="subject_chk(this.value)"  >
									<option value=""> Select Your subject group</option>
									<?php  while($c=mysqli_fetch_array($que)){ ?>
                  <option value="<?php echo $c['Subject_group_id'] ?>" data-value="<?php echo $c['Category_id'] ?>" data-subb="<?php echo $c['Subject_group_name'] ?>"><?php echo $c['Subject_group_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="form-group">
      <label for="subjectid">Subject Name</label>
      <select class="form-control" name="Subject_id" id="Subject_id" onchange="teacher_chk(this.value)">
									<option value=""> Select your subject</option>
									<?php  while($b=mysqli_fetch_array($quy)){ ?>
									<option value="<?php echo $b['Subject_id'] ?>" data-value="<?php echo $b['Subject_group_id'] ?>" data-sub="<?php echo $b['Subject_name'] ?>" <?php if($res_sub_id==$b['Subject_id']) echo "selected" ?>><?php echo $b['Subject_name'] ?></option>
                  <?php } ?>
	    </select>
    </div>
    <div class="but">
        <input class="btn btn-primary" type="submit" value="Submit" /><br>
    </div>
    
  </form>
<script>
    const elem=document.getElementById('Subject_group_id').cloneNode(true);
  const ogg=elem.options;
  console.log(ogg);
  document.getElementById('Subject_group_id').innerHTML='<option value=""> Please Select a Category</option>';
  function subject_groupchk(vall){
    document.getElementById('Subject_group_id').innerHTML='<option value=""> Please Select a Subject Group</option>';
  
    for(let j of ogg)
    {
      if(j.dataset)
      console.log(j.dataset.value)
       if(j.dataset.value===vall)
      document.getElementById('Subject_group_id').innerHTML+=`<option value="${j.value}"> ${j.dataset.subb}</option>`; 
    }
  }
  <?php 
  if(isset($res_grp_id))
  { ?>
  function subject_groupchk(vall,vall2){
    document.getElementById('Subject_group_id').innerHTML='<option value=""> Please Select a Subject 2 Group</option>';
  
    for(let j of ogg)
    {
    if(j.dataset.value==vall && j.value==vall2)
    {
        document.getElementById('Subject_group_id').innerHTML+=`<option value="${j.value}" selected> ${j.dataset.subb}</option>`; 
      
    }
       else  if(j.dataset.value==vall){
      document.getElementById('Subject_group_id').innerHTML+=`<option value="${j.value}"> ${j.dataset.subb}</option>`; 
    
    }
    }
  }
    subject_groupchk(<?php echo $res_category_id ?>,<?php echo $res_grp_id ?>);
  <?php } ?>
  
  const ele=document.getElementById('Subject_id').cloneNode(true);
  const og=ele.options;
  console.log(og);
  document.getElementById('Subject_id').innerHTML='<option value=""> Please Select a Subject Group</option>';
  function subject_chk(val){
    document.getElementById('Subject_id').innerHTML='<option value=""> Please Select a Subject</option>';
    
    for(let i of og)
    {
       if(i.dataset.value===val)
      document.getElementById('Subject_id').innerHTML+=`<option value="${i.value}"> ${i.dataset.sub}</option>`; 
    }
  
}
<?php 
  if(isset($res_grp_id))
  { ?>
   function subject_chk(vall,vall2){
    document.getElementById('Subject_id').innerHTML='<option value=""> Please Select a Subject</option>';
    
    for(let i of og)
    {
        if(i.dataset.value==vall && i.value==vall2)
    {
        document.getElementById('Subject_id').innerHTML+=`<option value="${i.value}" selected> ${i.dataset.sub}</option>`; 
    }
      
      
        else if(i.dataset.value==vall)
      document.getElementById('Subject_id').innerHTML+=`<option value="${i.value}"> ${i.dataset.sub}</option>`; 
    }
  
}
    subject_chk(<?php echo $res_grp_id ?>,<?php echo $res_sub_id ?>);
  <?php } ?>
  
</script>
<?php if(isset($sql)){ ?>
    <div id="DataTable">
  <div id="table_box_bootstrap"></div>
  <table>
    <thead>
        <tr>
          <th>Name</th>
          <th>Registration ID</th>
          <th>Class</th>
          <th>Fees</th>
          <th>Actions</th>
          
        </tr>
    </thead>
    <tbody class="scroll-pane">
        
        <?php  while($arr=mysqli_fetch_array($sql)){?> 
        <tr>
        <td><?php echo $arr['Student_name'] ?></td>
        <td><?php echo $arr['Student_reg_no'] ?></td>
        <td><?php echo $arr['Class'] ?></td>
        <td><?php echo $arr['Actual_fees'] ?></td>
        <td><a href="student_fees_edit.php?stud=<?php echo $arr['Student_id'] ?>&sub=<?php echo $res_sub_id ?>">Change</a>
        <?php } ?>
        
  </tbody>
</table>
</div>
        </div>
        <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>

<script>
    


    var box = paginator({
    table: document.getElementById("DataTable").getElementsByTagName("table")[0],
    box_mode: "list",
});
box.className = "box";
document.getElementById("table_box_bootstrap").appendChild(box);


/*****************************************************
 * Paginator Function                                *
 *****************************************************
 * config : {
 *     get_rows : function used to select rows to do pagination on
 *         If no function is provided, checks for a config.table element and looks for rows in there to page
 *
 *     box : Empty element that will have page buttons added to it
 *         If no config.box is provided, but a config.table is, then the page buttons will be added using the table
 *
 *     table : table element to be paginated
 *         not required if a get_rows function is provided
 *
 *     rows_per_page : number of rows to display per page
 *         default number is 10
 *
 *     page: page to display
 *         default page is 1
 *
 *     box_mode: "list", "buttons", or function. determines how the page number buttons are built.
 *         "list" builds the page index in list format and adds class "pagination" to the ul element. Meant for use with bootstrap
 *         "buttons" builds the page index out of buttons
 *         if this field is a function, it will be passed the config object as its ownly param and assumed to build the page index buttons
 *
 *     page_options: false or [{text: , value: }, ... ] used to set what the dropdown menu options are available, resets rows_per_page value
 *         false prevents the options from being displayed
 *         [{text: , value: }, ... ] allows you to customize what values can be chosen, a value of 0 will display all the table's rows.
 *         the default setup is
 *           [
 *               { value: 5,  text: '5'   },
 *               { value: 10, text: '10'  },
 *               { value: 20, text: '20'  },
 *               { value: 50, text: '50'  },
 *               { value: 100,text: '100' },
 *               { value: 0,  text: 'All' }
 *           ]
 *
 *      active_class: set the class for page buttons to have when active.
 *          defaults to "active"
 *
 *     tail_call: function to be called after paginator is done
 * }
 */
function paginator(config) {
    // throw errors if insufficient parameters were given
    if (typeof config != "object")
        throw "Paginator was expecting a config object!";
    if (typeof config.get_rows != "function" && !(config.table instanceof Element))
        throw "Paginator was expecting a table or get_row function!";

    // get/make an element for storing the page numbers in
    var box;
    if (!(config.box instanceof Element)) {
        config.box = document.createElement("div");
    }
    box = config.box;

    // get/make function for getting table's rows
    if (typeof config.get_rows != "function") {
        config.get_rows = function () {
            var table = config.table
            var tbody = table.getElementsByTagName("tbody")[0]||table;

            // get all the possible rows for paging
            // exclude any rows that are just headers or empty
            children = tbody.children;
            var trs = [];
            for (var i=0;i<children.length;i++) {
                if (children[i].nodeType = "tr") {
                    if (children[i].getElementsByTagName("td").length > 0) {
                        trs.push(children[i]);
                    }
                }
            }

            return trs;
        }
    }
    var get_rows = config.get_rows;
    var trs = get_rows();

    // get/set rows per page
    if (typeof config.rows_per_page == "undefined") {
        var selects = box.getElementsByTagName("select");
        if (typeof selects != "undefined" && (selects.length > 0 && typeof selects[0].selectedIndex != "undefined")) {
            config.rows_per_page = selects[0].options[selects[0].selectedIndex].value;
        } else {
            config.rows_per_page = 10;
        }
    }
    var rows_per_page = config.rows_per_page;

    // get/set current page
    if (typeof config.page == "undefined") {
        config.page = 1;
    }
    var page = config.page;

    // get page count
    var pages = (rows_per_page > 0)? Math.ceil(trs.length / rows_per_page):1;

    // check that page and page count are sensible values
    if (pages < 1) {
        pages = 1;
    }
    if (page > pages) {
        page = pages;
    }
    if (page < 1) {
        page = 1;
    }
    config.page = page;
 
    // hide rows not on current page and show the rows that are
    for (var i=0;i<trs.length;i++) {
        if (typeof trs[i]["data-display"] == "undefined") {
            trs[i]["data-display"] = trs[i].style.display||"";
        }
        if (rows_per_page > 0) {
            if (i < page*rows_per_page && i >= (page-1)*rows_per_page) {
                trs[i].style.display = trs[i]["data-display"];
            } else {
                trs[i].style.display = "none";
            }
        } else {
            trs[i].style.display = trs[i]["data-display"];
        }
    }

    // page button maker functions
    config.active_class = config.active_class||"active";
    if (typeof config.box_mode != "function" && config.box_mode != "list" && config.box_mode != "buttons") {
        config.box_mode = "button";
    }
    if (typeof config.box_mode == "function") {
        config.box_mode(config);
    } else {
        var make_button;
        if (config.box_mode == "list") {
            make_button = function (symbol, index, config, disabled, active) {
                var li = document.createElement("li");
                var a  = document.createElement("a");
                a.href = "#";
                a.innerHTML = symbol;
                a.addEventListener("click", function (event) {
                    event.preventDefault();
                    this.parentNode.click();
                    return false;
                }, false);
                li.appendChild(a);

                var classes = [];
                if (disabled) {
                    classes.push("disabled");
                }
                if (active) {
                    classes.push(config.active_class);
                }
                li.className = classes.join(" ");
                li.addEventListener("click", function () {
                    if (this.className.split(" ").indexOf("disabled") == -1) {
                        config.page = index;
                        paginator(config);
                    }
                }, false);
                return li;
            }
        } else {
            make_button = function (symbol, index, config, disabled, active) {
                var button = document.createElement("button");
                button.innerHTML = symbol;
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    if (this.disabled != true) {
                        config.page = index;
                        paginator(config);
                    }
                    return false;
                }, false);
                if (disabled) {
                    button.disabled = true;
                }
                if (active) {
                    button.className = config.active_class;
                }
                return button;
            }
        }

        // make page button collection
        var page_box = document.createElement(config.box_mode == "list"?"ul":"div");
        if (config.box_mode == "list") {
            page_box.className = "pagination";
        }

        var left = make_button("&laquo;", (page>1?page-1:1), config, (page == 1), false);
        page_box.appendChild(left);

        for (var i=1;i<=pages;i++) {
            var li = make_button(i, i, config, false, (page == i));
            page_box.appendChild(li);
        }

        var right = make_button("&raquo;", (pages>page?page+1:page), config, (page == pages), false);
        page_box.appendChild(right);
        if (box.childNodes.length) {
            while (box.childNodes.length > 1) {
                box.removeChild(box.childNodes[0]);
            }
            box.replaceChild(page_box, box.childNodes[0]);
        } else {
            box.appendChild(page_box);
        }
    }
  
  var dvRecords = document.createElement("div");
  dvRecords.className = "dvrecords";
  box.appendChild(dvRecords);

    // make rows per page selector
    if (!(typeof config.page_options == "boolean" && !config.page_options)) {
        if (typeof config.page_options == "undefined") {
            config.page_options = [
                { value: 5,  text: '5'   },
                { value: 10, text: '10'  },
                { value: 20, text: '20'  },
                { value: 50, text: '50'  },
                { value: 100,text: '100' },
                { value: 0,  text: 'All' }
            ];
        }
        var options = config.page_options;
        var select = document.createElement("select");
        select.className = "records";
        for (var i=0;i<options.length;i++) {
            var o = document.createElement("option");
            o.value = options[i].value;
            o.text = options[i].text;
            select.appendChild(o);
        }
        select.value = rows_per_page;
        select.addEventListener("change", function () {
            config.rows_per_page = this.value;
            paginator(config);
        }, false);
        dvRecords.appendChild(select);
    }

    // status message
    var stat = document.createElement("span");
    stat.className = "stats";
    stat.innerHTML = "On page " + page + " of " + pages
        + ", showing rows " + (((page-1)*rows_per_page)+1)
        + " to " + (trs.length<page*rows_per_page||rows_per_page==0?trs.length:page*rows_per_page)
        + " of " + trs.length;
    
    dvRecords.appendChild(stat);

    // run tail function
    if (typeof config.tail_call == "function") {
        config.tail_call(config);
    }
    return box;
}


/**
 * jQuery.fn.sortElements
 * --------------
 * @author James Padolsey (http://james.padolsey.com)
 * @version 0.11
 * @updated 18-MAR-2010
 * --------------
 * @param Function comparator:
 *   Exactly the same behaviour as [1,2,3].sort(comparator)
 *   
 * @param Function getSortable
 *   A function that should return the element that is
 *   to be sorted. The comparator will run on the
 *   current collection, but you may want the actual
 *   resulting sort to occur on a parent or another
 *   associated element.
 *   
 *   E.g. $('td').sortElements(comparator, function(){
 *      return this.parentNode; 
 *   })
 *   
 *   The <td>'s parent (<tr>) will be sorted instead
 *   of the <td> itself.
 */
jQuery.fn.sortElements = (function(){
    
    var sort = [].sort;
    
    return function(comparator, getSortable) {
        
        getSortable = getSortable || function(){return this;};
        
        var placements = this.map(function(){
            
            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,
                
                // Since the element itself will change position, we have
                // to have some way of storing it's original position in
                // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );
            
            return function() {
                
                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }
                
                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);
                
            };
            
        });
       
        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });
        
    };
    
})();

    var table = $('table');
    
    $('th')
        .wrapInner('<span title="sort this column"/>')
        .each(function(){
            
            var th = $(this),
                thIndex = th.index(),
                inverse = false;
            
            th.click(function(){
                
                table.find('td').filter(function(){
                    
                    return $(this).index() === thIndex;
                    
                }).sortElements(function(a, b){
                    
                    return $.text([a]) > $.text([b]) ?
                        inverse ? -1 : 1
                        : inverse ? 1 : -1;
                    
                }, function(){
                    
                    // parentNode is the element we want to move
                    return this.parentNode; 
                    
                });
                
                inverse = !inverse;
                    
            });
                
        });



</script>
<?php } ?>
</body>
</html>