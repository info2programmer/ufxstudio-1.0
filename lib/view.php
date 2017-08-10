<?php

require ('db_config.php');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               Show All Portfolio            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function showPortfolio()
{
	$query="SELECT * FROM `tbl_portfolio`";
	$result=mysql_query($query);

	if($result==true)
	{
		
		while($row=mysql_fetch_array($result))
		{
			echo "<div class='col-lg-3 col-sm-6 col-xs-12 noPadding text-center mix ".$row['category']."'>
				<div class='folioImg'>"	;
			if($row['type']=='Video')
			{
				echo "<img src='admin/upload/Portfolio/".$row['imgpath']."' >
					<div class='folioHover2 dirHov'>
						<a href='".$row['youtubelink']."&width=1280&height=720' class='prePhoto' data-rel='prettyPhoto'><i class='icon-search3'></i></a>
					</div>";
			}
			else
			{
			   echo "<img src='admin/upload/Portfolio/".$row['imgpath']."' >
					<div class='folioHover2 dirHov'>
						<a href='admin/upload/Portfolio/".$row['imgpath']."' class='prePhoto' data-rel='prettyPhoto'><i class='icon-search3'></i></a>
					</div>";
			}
			echo "</div>
		</div>
		"; 
		}
		
	}
}






/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               Show All Home Image Slider            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function showImageSlider()
{
	$query="SELECT * FROM `tbl_imageslider`";
	$result=mysql_query($query);
	if($result==true)
	{
		while($row=mysql_fetch_array($result))
		{
			echo " <div class='singleCaros'>
					  <img src='admin/upload/imageslider/".$row['imagepath']."' />
                    </div>
			";
		}
	}
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               Show All Services            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showAllServices()
{
	$query="SELECT * FROM `tbl_sevices` ";
	$result=mysql_query($query);
	if($result==true)
	{
		while($row=mysql_fetch_array($result))
		{
			echo "
			<div class='singleEvents wow fadeInUp' data-wow-duration='700ms' data-wow-delay='300ms'>
			<div class='eventThumb'>
		        <img src='admin/upload/ServicesCoverImages/".$row['ImgPath']."' />
		    </div>
		    <div class='eventDet'>
        <h4><a href='DynamicService.php?Service=".base64_encode($row['id'])."'>".$row['Name']."</a></h4>
        <p>".$row['ShortDiscription']."</p>
        <div class='evMeta'>
            <a href='DynamicService.php?Service=".base64_encode($row['id'])."'><button type = 'button' style='margin-left:5px;' class = 'btn btn-info'>Read More</button></a>
        </div>
    </div>
    </div>
			";
		}
	}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               Show Single Services            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showAllServicesByID($id)
{
	$id=base64_decode($id);
	$query="SELECT * FROM `tbl_sevices` WHERE `id`='".mysql_real_escape_string($id)."' ";
	$result=mysql_query($query);
	if($result==true)
	{
		$row=mysql_fetch_array($result);
		return $row;
	}
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               Show Services Immages           ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function showAllServicesImagesByID($id)
{
	//echo "<script>alert('".$id."');</script>";
	$id=base64_decode($id);
	$query="SELECT * FROM `tbl_servicesimg` WHERE `Services_id`='".$id."'";
	$result=mysql_query($query) ;
	while($row=mysql_fetch_array($result))
	{
		echo "<li><img src='admin/upload/ServicesMultipleImage/".$row['imgPath']."' alt=wow slider title=singleEvent id=wows1_1/></li>";
	}
	
}




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               Show All Tutorials           ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ShowAllTutorials()
{
	$query="SELECT * FROM `tbl_tutorlas`";
	$result=mysql_query($query) ;
	while($row=mysql_fetch_array($result))
		{
			echo "
			<div class='col-lg-3 col-sm-6 col-xs-12 noPadding text-center mix video'>
             <div class='folioImg'>
				<img src='admin/upload/TutorialCover/".$row['imgLink']."' >
	                <div class='folioHover2 dirHov'>
	                    <a href='".$row['youtube']."&width=1280&height=720' class='prePhoto' data-rel='prettyPhoto'><i class='icon-search3'></i></a>
	                </div>
	                </div>
			</div>
			";
		}
}





/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////               Show All Blog Single           ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function ShowAllSingleBlog()
{
	$query="SELECT * FROM `tbl_blog`";
	$result=mysql_query($query) ;
	while($row=mysql_fetch_array($result))
	{
		echo "
			<div class='col-lg-6 col-sm-6 col-xs-12 text-center wow zoomIn' data-wow-duration='700ms' data-wow-delay='300ms'>
				<div class='blogCotent'>
				<div class='postThumb'>
				<img src='admin/upload/BlogImage/".$row['ImgPath']."'>
				<div class='postDate'>
				<h1>".$row['Date']."</h1>
				<p>".$row['Year']."</p>
				</div>
				</div>
				<div class='postContent two'>
				<h3><a href='DynamicBlog.php?Blog=".base64_encode($row['id'])."'>".$row['BlogName']."</a></h3>
				<div class='postMeta'>
				<div class='metaLeft pull-left'>
				<i class='icon-user3'></i>
				<span>by</span>
				<a href='javascript:void(0);'>Admin</a>
				</div>
				<div class='metaRight pull-right'>
				</div>
				<div class='clearfix'></div>
				</div>
				</div>
				</div>
			</div>


		";
	}
}
function ShowAllDynamicBlog($id)
{
	$id=base64_decode($id);
	$query="SELECT * FROM `tbl_blog` WHERE `id`='".$id."' ";
	$result=mysql_query($query) ;
	$row=mysql_fetch_array($result);
	return $row;
}


function viewClientlist()
{
	$sql="SELECT * FROM `tbl_clients`";
	$result=mysql_query($sql);

	if($result==true)
	{
		while($row=mysql_fetch_array($result))
		{
			echo "
				<div class='owl-item'>
                <div class='col-sm-12'>
                    <div class='client-item'>
                        <img src='admin/upload/clients/".$row['image']."' >
                    </div>
                </div>
            </div>
			";
		}
	}
}
function viewTeam()
{
	$sql="SELECT * FROM `tbl_team`";
	$result=mysql_query($sql);

	if($result==true)
	{
		while($row=mysql_fetch_array($result))
		{
			echo "
				<div class='col-lg-2 col-lg-offset-1 col-sm-6 col-xs-12 text-center'>
                <div class='sinlgeTeam'>
                    <div class='teamImg'>
                        <img src='admin/upload/Team/".$row['image']."' alt=''>
                    </div>
                    <div class='teamDetails'>
                        <h3>".$row['name']."</h3>
                        <h5>".$row['designation']."</h5>
                    </div>
                </div>
            </div>
			";
		}
	}
}

//this function for dynamic testimonial
function testimonial(){
	$sql="SELECT * FROM tbl_testimonial";
	$result=mysql_query($sql);
	$count=0;
	if($result==true){
		while($row=mysql_fetch_array($result)){
			$count++;
			if($count==1)
			{

				echo "
				<div class='item active'>
					<div class='singleTestiImg'>
						<img src='admin/upload/Testimonial/".$row['image']."' />
					</div>
					<div class='quote'>
						<p class='quotation'>	&#34;".$row['comment']."&#34;</p>
						<p class='name'>-  <span> ".$row['name']."  </span></p>
					</div>
				</div>
				";
			}
			else{
				echo "
				<div class='item'>
					<div class='singleTestiImg'>
						<img src='admin/upload/Testimonial/".$row['image']."' />
					</div>
					<div class='quote'>
						<p class='quotation'>	&#34;".$row['comment']."&#34;</p>
						<p class='name'>-  <span> ".$row['name']."  </span></p>
					</div>
				</div>
				";
			}
		}
	}
}


?>
