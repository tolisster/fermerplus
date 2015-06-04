<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="/jwplayer.js"></script>
</head>

<body>




											<div class="skinpreview">
							<div name="mediaspace" id="mediaspace">
								<div class="VideoPlayer">
									<video
									  id="player1"
									  poster="/jw/upload/bunny.jpg"
									  width="450"
									  height="270"
									  controls>
										<source src="/video.mp4" type="video/mp4" />
									</video>
								</div>

								<script type="text/javascript">
								jwplayer("player1").setup({
									stretching: 'fill',
									modes: [{
										type: 'flash',
										src: "/player5.9.swf",
										config: {skin: "/modieus.zip"}
									},
									{
										type: 'html5',
										config: {skin: "/modieus.xml"}
									}]
								});
								</script>
</body>
</html>
