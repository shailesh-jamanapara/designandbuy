<div class="col-lg-2 col-sm-2 col-md-2 shadow-lg  bg-black" >
                  <div class="row  ml-2  bg-black">
                          <div class="col-lg-12 col-sm-12 mt-4 pl-2 text-white bg-black mb-2 font-weight-light">Alignment</div>
                          <div class="col-lg-2 pl-1 " data-placement="top" title="Align Left"  >
                            <button  class="btn  btn-black  text-center alignment"  data-action="left" >
                              Left
                            </button>
                          </div> 
                          <div class="col-lg-2 col-md-2" data-placement="top" title="Align Center"  >
                            <button  class="btn btn-black  text-left  alignment" data-action="center" >
                                  Center
                            </button>
                          </div> 
                          
                          <div class="col-lg-2 col-md-2"  data-placement="top" title="Align Right"  >
                            <button  class="btn btn-black  text-cente  alignment" data-action="right">
                                  Right
                            </button>
                          </div> 
                          <div class="col-lg-2 col-md-2 "  data-placement="top" title="Align Top"  >
                            <button  class="btn btn-black  text-cente alignment"  data-action="top">
                                  Top
                            </button>
                          </div> 
                          <div class="col-lg-2 col-md-2"  title="Align Bottom"  >
                            <button  class="btn btn-black text-cente alignment" data-action="bottom">
                                  Bottom
                            </button>
                          </div> 
                          <label class="col-lg-12 col-sm-12 mt-2 pl-2 text-white bg-black">Tools</label>
                          <!-- Tools Div -->
                          <div class="col-lg-12 b-bottom pb-2">
                            <div class="row" id="div_tools">
                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a href="javascript:void(0);" onclick="javascript:deleteObject();"><i class="fa fa-trash" aria-hidden="true"></i> <span>Delete</span></a>
                              </div>
                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a href="javascript:void(0);" ><i class="fa fa-reply" aria-hidden="true"></i> <span>Undo</span></a>
                              </div>
                            
                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a href="jacascript:void(0);" id="zoomIn" ><i class="fa fa-search-plus" aria-hidden="true"></i> <span>Zoom In</span></a>
                              </div>
                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a  href="jacascript:void(0);" id="zoomOut"><i class="fa fa-search-minus" aria-hidden="true"></i> <span>Zoom Out</span></a>
                              </div>
                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a href="jacascript:void(0);" id="ResetZoom"><i class="fa fa-cogs" aria-hidden="true"></i> <span>Reset Zoom</span></a>
                              </div>
                              
                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a href="#"><i class="fa fa-tablet" aria-hidden="true"></i> <span>Vertical</span></a>
                              </div>

                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a href="#"><i class="fa fa-window-maximize" aria-hidden="true"></i> <span>Horizontal</span></a>
                              </div>
                              
                              <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                  <a href="javascript:void(0);" onclick="javascript:clearCanvas();"><i class="fa fa-recycle" aria-hidden="true"></i> <span>Clear</span></a>
                              </div>
                                </div>
                          </div> 
                         
                          <!--/Tools Div -->
                          <!-- Div Font -->
                          <label class="col-lg-12 col-sm-12 mt-2 pl-2 text-white bg-black mb-2" id="lbl_font"  data-placement="left" title="Configure Fonts" >Font</label>
                          <div class="col-lg-12 pl-1 ob-alignment b-bottom pb-2 div-font-tool-box" >
                            <div class="row" id="div_font_tools" >
                              <div class="col-lg-6 col-sm-6">
                                <div class="dropdown">
                                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Select Font </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);"> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Arial" style="font-family:Arial">Arial</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Arial-black" style="font-family:Arial-black" >Arial Black</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Bookman" style="font-family:Bookman" >Bookman</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Candara" style="font-family:Candara" >Candara</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Comic Sans MS" style="font-family:Comic Sans MS" >Comic Sans MS</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Courier" style="font-family:Courier" >Courier</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="FontAwesome" style="font-family:FontAwesome" >Font Awesome</a>
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Courier" style="font-family:Garamond" >Garamond</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Helvetica" style="font-family:Helvetica" >Helvetica</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Impact" style="font-family:Garamond" >Impact</a> 
                                        <a class="dropdown-item font-face" href="javascript:void(0);" id="Roboto" style="font-family:Roboto" >Roboto</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Sans-serif" style="font-family:Sans serif" >Sans serif</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Times New Roman" style="font-family:Times New Roman" >Times New Roman</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Times" style="font-family:Times" >Times</a> 
                                        <a class="dropdown-item font-family" href="javascript:void(0);" id="Tahoma" style="font-family:Tahoma" >Tahoma</a> 
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                  <div class="dropdown">
                                      <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButtonSize" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Select size </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSize" x-placement="top-start" style="position: aGaramondbsolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);"> 
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="6" >6</a> 
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="8" >8</a> 
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="10" >10</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="11" >11</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="12" >12</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="13" >13</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="14" >14</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="15" >15</a> 
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="16" >16</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="17" >17</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="18" >18</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="19" >19</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="20" >20</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="22" >22</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="24" >24</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="26" >26</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="28" >28</a>
                                        <a class="dropdown-item  font-size" href="javascript:void(0);" id="30" >30</a>
                                        
                                      </div>
                                  </div>
                                </div>
                              </div>
                          </div> 
                            </div>
                          <!-- /Div Font-->
                          <div class="col-lg-12 col-sm-12  mt-2 div-font-tool-box">
                            <div class="row ml-2 ">
                            <div class="col-lg-2 pl-1 " data-placement="top" title="Align Left"  >
                            <button  class="btn  btn-black  text-cente text-alignment"  data-action="left" >
                              Left
                            </button>
                          </div> 
                          <div class="col-lg-2 col-md-2" data-placement="top" title="Align Center"  >
                            <button  class="btn btn-black  text-left  text-alignment" data-action="center" >
                                  Center
                            </button>
                          </div> 
                          
                          <div class="col-lg-2 col-md-2"  data-placement="top" title="Align Right"  >
                            <button  class="btn btn-black  text-cente  text-alignment" data-action="right">
                                  Right
                            </button>
                          </div> 
                            </div>
                          </div>
                          <div class="col-lg-12 col-sm-12  mt-2 div-font-tool-box">
                                  <div class="row ml-1">
                                    <div class="col-lg-2 col-md-2 " ><button class="btn btn-white  btn-rounded" id="colorpicker_text" data-placement="top" title="Fill color"  onclick=" $('#colorPickerModal').modal('show');">&nbsp;&nbsp;&nbsp;</button></div>

                                    <div class="col-lg-2  col-md-2" data-placement="top" title="Change to Bold"  onclick="javascript:changeFontStyle('bold');"><span><b class="text-white">B</b></span></div>

                                    <div class="col-lg-2 col-md-2" data-placement="top" title="Change to Italic"   onclick="javascript:changeFontStyle('italic');" ><span><i class="text-white">I</i></div>

                                    <div class="col-lg-2 col-md-2" data-placement="top" title="Change to Underline"   onclick="javascript:changeFontStyle('underline');" ><span><u class="text-white">U</u></div>
                                  </div> 
                          </div> 
                          <div class="col-lg-12 col-sm-12  mt-1 div-font-tool-box">
                                  <div class="row ml-1">
                                    <label class="col-lg-5 col-sm-5 pl-1 text-white bg-black">Letter Spacing</label>
                                    <div class="col-lg-7 col-sm-7 col-md-7  pull-right spacer"><input class="form-control" type="range" min="0" max="1000" id="space-range-input"></div> 
                                </div>
                          </div>
                          <label class="col-lg-12 col-md-12 pl-1 text-white bg-black mt-1 mb-1">Border</label>
                          <div class="col-lg-12 col-md-12 pull-right spacer  mt-2  mb-1">
                          <span>Thickness</span>
                              <input class="form-control" type="range" min="0" max="10" id="border-thickness-input">
                          </div>
                          
                          <div class="col-lg-12 col-md-12 pull-right spacer  mt-2  mb-1">
                          <span>Color</span>
                              <button class="btn btn-white  btn-rounded pull-right" data-placement="top" title="Fill color"  onclick=" $('#borderColorPickerModal').modal('show');">&nbsp;&nbsp;&nbsp;</button>
                          </div>
                        </div>
                </div>