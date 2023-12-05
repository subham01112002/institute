<?php 
include("conn.php");

if(empty($_REQUEST['month'])){
    $curr_month=date("m");
    $curr_year=date("Y");
}
else{
    $curr_month=$_REQUEST['month'];
    $curr_year=$_REQUEST['year'];
}


$sql_exp=mysqli_query($conn,"SELECT SUM(expenditure) AS 'expenditure',name,date,phone FROM ((SELECT Teacher_name AS 'name',date AS 'date',actual_fees AS 'expenditure',Teacher_phone AS 'phone' FROM `teacher_fees` INNER JOIN `teacher` ON `teacher_fees`.`teacher_id` = `teacher`.`Teacher_id` WHERE `date` LIKE '$curr_year-$curr_month-%') UNION (SELECT payment_name,payment_date,payment_amt,payment_phone FROM `expenditure`  WHERE `payment_date` LIKE '$curr_year-$curr_month-%')) AS A GROUP BY date ORDER BY `date` DESC");

$sql_income=mysqli_query($conn,"SELECT SUM(money) AS 'money',name,date,phone FROM ((SELECT Student_name AS 'name',Actual_fees AS 'money',Phone_no AS 'phone', date AS 'date' , `fees_history`.month AS 'month'  FROM `fees_history` INNER JOIN `subject_master` ON `fees_history`.`subject_id` = `subject_master`.`Subject_id` INNER JOIN   student_registration ON `student_registration`.`Student_id`=`fees_history`.`student_id` INNER JOIN  student_activity ON `student_activity`.`Student_id` = `fees_history`.`student_id` WHERE `fees_history`.`date` LIKE '$curr_year-$curr_month-%')  UNION (SELECT payment_by,payment_amt,payment_phone,payment_date,payment_month FROM `income` WHERE `payment_date` LIKE '$curr_year-$curr_month-%')) AS A GROUP BY date   ORDER BY date DESC");

$arr_exp=array();
$arr_inc=array();
while($s=mysqli_fetch_array($sql_exp))
{
    array_push($arr_exp,$s);
}
while($q=mysqli_fetch_array($sql_income))
{
    array_push($arr_inc,$q);
}
// Define a custom comparison function
function compareDates($a, $b) {
    $dateA = strtotime($a['date']);
    $dateB = strtotime($b['date']);
    
    if ($dateA == $dateB) {
       return 0;
    } elseif ($dateA > $dateB) {
       return 1;
    } else {
       return -1;
    }
 }
 
 // Sort the multidimensional array using the custom comparison function
 usort($arr_inc, 'compareDates');
 usort($arr_exp, 'compareDates');
 $new_arr=array();
for($i=0;$i<max(count($arr_inc),count($arr_exp));$i++){
    if(isset($arr_inc[$i]) && isset($arr_exp[$i]))
    {
        if(strtotime($arr_inc[$i]['date'])< strtotime($arr_inc[$i]['date']))
        array_push($new_arr,$arr_inc[$i]);
        else if(strtotime($arr_inc[$i]['date'])>strtotime($arr_inc[$i]['date']))
        array_push($new_arr,$arr_exp[$i]);
        else
        array_push($new_arr,[$arr_inc[$i],$arr_exp[$i]]);
    }
    else if(isset($arr_inc[$i]))
    {
        array_push($new_arr,$arr_inc[$i]); 
    }
    else{
        array_push($new_arr,$arr_exp[$i]); 
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"  href="student_list.css">
</head>
<body>
<div class="form-box">
  <h1><a href="index.php"><i class="fa-sharp fa-solid fa-id-card"></i></a></h1>
  <h1>Debit Credit</h1>
<div style="display:flex;justify-content:end;gap:10px">
<select id="month" onchange="month(this.value)">
<option value="01" <?php if($curr_month=="1") echo "selected"; ?>  <?php if(date("m")<"1") echo "disabled"; ?>>January</option>
<option value="02" <?php if($curr_month=="2") echo "selected"; ?>  <?php if(date("m")<"2") echo "disabled"; ?>>February</option>
<option value="03" <?php if($curr_month=="3") echo "selected"; ?>  <?php if(date("m")<"3") echo "disabled"; ?>>March</option>
<option value="04" <?php if($curr_month=="4") echo "selected"; ?>  <?php if(date("m")<"4") echo "disabled"; ?>>April</option>
<option value="05" <?php if($curr_month=="5") echo "selected"; ?>  <?php if(date("m")<"5") echo "disabled"; ?>>May</option>
<option value="06" <?php if($curr_month=="6") echo "selected"; ?>  <?php if(date("m")<"6") echo "disabled"; ?>>June</option>
<option value="07" <?php if($curr_month=="7") echo "selected"; ?>  <?php if(date("m")<"7") echo "disabled"; ?>>July</option>
<option value="08" <?php if($curr_month=="8") echo "selected"; ?>  <?php if(date("m")<"8") echo "disabled"; ?>>August</option>
<option value="09" <?php if($curr_month=="9") echo "selected"; ?> <?php if(date("m")<"9") echo "disabled"; ?>>September</option>
<option value="10" <?php if($curr_month=="10") echo "selected"; ?> <?php if(date("m")<"10") echo "disabled"; ?>>October</option>
<option value="11" <?php if($curr_month=="11") echo "selected"; ?>  <?php if(date("m")<"11") echo "disabled"; ?>>November</option>
<option value="12" <?php if($curr_month=="12") echo "selected"; ?> <?php if(date("m")<"12") echo "disabled"; ?>>December</option>

</select>
<select id="year" onchange="year(this.value)">
   
<?php for($i=date("Y");$i>=2010;$i--){ ?>
    
    <option value="<?php echo $i; ?>" <?php if($curr_year==$i) echo "selected" ?>><?php echo $i; ?></option>
    <?php } ?>
   
</select>
</div>
<div id="DataTable">
  <div id="table_box_bootstrap"></div>
  <table>
    <thead>
        <tr>
          <th data-content='Date'>Date</th>
          <th data-content='Debit'>Debit Amount</th>
          <th data-content='Credit'>Credit Amount</th>
        </tr>
    </thead>
    <tbody class="scroll-pane">
        <?php for($i=0;$i<count($new_arr);$i++){  ?>
        <tr>
        <td><?php echo isset($new_arr[$i]['date']) ? $new_arr[$i]['date']:$new_arr[$i][0]['date']  ?></td>
        <td class="expenditure"><?php echo !is_array($new_arr[$i][0]) ? isset($new_arr[$i]['expenditure']) ? $new_arr[$i]['expenditure']:0 : $new_arr[$i][1]['expenditure'] ?></td>
        <td class="income"><?php echo !is_array($new_arr[$i][0]) ? isset($new_arr[$i]['money']) ? $new_arr[$i]['money']: 0 : $new_arr[$i][0]['money'] ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td>
                Total :
            </td>
            <td class='total_exp'>

            </td>
            <td class="total_inc">

            </td>
        </tr>
        <tr>
            <td></td>
            <td class="p-l"></td>
            <td  class='deb-cred'></td>
        </tr>
  </tbody>
</table>
</div>
        </div>
        <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script>
    var income=0;
    ;
    for(let i=0;i<document.getElementsByClassName('income').length;i++)
    {
        income+=Number(document.getElementsByClassName('income')[i].innerHTML);        
    }
    var expenditure=0;
    for(let i=0;i<document.getElementsByClassName('expenditure').length;i++)
    {
        expenditure+=Number(document.getElementsByClassName('expenditure')[i].innerHTML);        
    }
    document.getElementsByClassName('total_exp')[0].innerHTML=expenditure;
    document.getElementsByClassName('total_inc')[0].innerHTML=income;
    
    document.getElementsByClassName('p-l')[0].innerHTML=income>expenditure ? "Profile" : "Loss";
    
    document.getElementsByClassName('deb-cred')[0].innerHTML=Math.abs(income-expenditure);
    if(income>expenditure){
        document.getElementsByClassName('deb-cred')[0].style.color='green';
        document.getElementsByClassName('deb-cred')[0].style.fontWeight='800';
        
    }
    else{
        document.getElementsByClassName('deb-cred')[0].style.color='red';
        document.getElementsByClassName('deb-cred')[0].style.fontWeight='800';
    }
    
    
    function month(val){

window.location.href="debit_credit.php?month="+val+"&year="+document.getElementById('year').value;
}
function year(val){

window.location.href="debit_credit.php?month="+document.getElementById('month').value+"&year="+val;
}



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
</body>
</html>