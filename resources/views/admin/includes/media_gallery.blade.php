<div class="addfeaturesimg">

<div class="featuresimgtop"><img src="{{asset('admin/assets/img/tshirt-blue.png')}}" alt="" class="addfeaturesimg"></div>

    <a type="submit" class="view-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Set Featured images</a>
</div>

<div class="modal fade featured-img" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Featured images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Upload Files</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Media
                            Library</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="drop-fileuploadflex">
                            <div class="drop-fileupload">
                                <h3>Drop Files To Upload <span>or</span></h3>
                                <a type="submit" class="view-btn">Select File</a>
                                <h4>Maximum upload file size: 750MB:</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="featuresimggallery">
                            <div class="featuresimgbox-sec">
                                <div class="featuresimgbox">
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-black.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock active"><img
                                            src="{{asset('admin/assets/img/tshirt-blue.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-same.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-white.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-black.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-blue.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-same.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-white.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-black.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-blue.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-same.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-white.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-black.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-blue.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-same.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                    <div class="featuresimgboxblock"><img
                                            src="{{asset('admin/assets/img/tshirt-white.png')}}" alt=""
                                            class="addfeaturesimg"></div>
                                </div>
                            </div>
                            <div class="featuresimg-atachment">
                                <div class="atachment-detail">
                                    <h5>Attachment Details</h5>
                                    <div class="atachment-info">
                                        <div class="atachment-info-img"><img
                                                src="{{asset('admin/assets/img/tshirt-black.png')}}" alt=""
                                                class="addfeaturesimg"></div>
                                        <div class="atachment-info-detail">
                                            <h5>sku-number.png</h5>
                                            <span>December 19, 2024</span>
                                            <span>26 KB</span>
                                            <span>630 by 640 Pixele</span>
                                            <a class="attachment-editimg">Edit Image</a>
                                            <a class="attachment-editimg attachment-delete">Delete Permaentaly</a>
                                        </div>
                                    </div>

                                    <div class="atachment-form">
                                            <div class="atachment-field">
                                                <label>Alt Text</label>
                                                <textarea class="textbox"></textarea>
                                            </div>
                                            <div class="atachment-field">
                                                <label>Title</label>
                                                <input class="textbox" placeholder="SKU Number">
                                            </div>
                                            <div class="atachment-field">
                                                <label>Caption</label>
                                                <textarea class="textbox"></textarea>
                                            </div>
                                            <div class="atachment-field">
                                                <label>Description</label>
                                                <textarea class="textbox"></textarea>
                                            </div>
                                            <div class="atachment-field">
                                                <label>File URL:</label>
                                                <textarea class="textbox"></textarea>
                                            </div>
                                            <a type="submit" class="view-btn">Copy URL to clipboard</a>
                                        </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="view-btn">Set Featured Image</button>
            </div>
        </div>
    </div>
</div>