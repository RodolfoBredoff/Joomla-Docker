<div class="uk-grid uk-grid-divider uk-form uk-form-horizontal" data-uk-grid-margin>
    <div class="uk-width-medium-1-4">

        <div class="wk-panel-marginless">
            <ul class="uk-nav uk-nav-side" data-uk-switcher="{connect:'#nav-content'}">
                <li><a href="">{{'Layout' | trans}}</a></li>
                <li><a href="">{{'Media' | trans}}</a></li>
                <li><a href="">{{'Content' | trans}}</a></li>
                <li><a href="">{{'Lightbox' | trans}}</a></li>
                <li><a href="">{{'General' | trans}}</a></li>
            </ul>
        </div>

    </div>
    <div class="uk-width-medium-3-4">

        <ul id="nav-content" class="uk-switcher">
            <li>

                <h3 class="wk-form-heading">{{'Grid' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-grid">{{'Gutter' | trans}}</label>
                    <div class="uk-form-controls">
                        <select class="uk-form-width-small" ng-model="widget.data['gutter']">
                            <option value="default">{{'Default' | trans}}</option>
                            <option value="collapse">{{'Collapse' | trans}}</option>
                            <option value="small">{{'Small' | trans}}</option>
                            <option value="large">{{'Large' | trans}}</option>
                            <option value="x-large">{{'Extra Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Columns' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-columns">{{'Phone Portrait' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-columns" class="uk-form-width-medium" ng-model="widget.data['columns']">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-columns-small">{{'Phone Landscape' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-columns-small" class="uk-form-width-medium" ng-model="widget.data['columns_small']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-columns-medium">Tablet</label>
                    <div class="uk-form-controls">
                        <select id="wk-columns-medium" class="uk-form-width-medium" ng-model="widget.data['columns_medium']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-columns-large">{{'Desktop' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-columns-large" class="uk-form-width-medium" ng-model="widget.data['columns_large']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-columns-xlarge">{{'Large Screens' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-columns-xlarge" class="uk-form-width-medium" ng-model="widget.data['columns_xlarge']">
                            <option value="0">{{'Inherit' | trans}}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Items' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-animation">{{'Animation' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-animation" class="uk-form-width-medium" ng-model="widget.data['animation']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="fade">{{'Fade' | trans}}</option>
                            <option value="scale-up">{{'Scale Up' | trans}}</option>
                            <option value="scale-down">{{'Scale Down' | trans}}</option>
                            <option value="slide-top">{{'Slide Top' | trans}}</option>
                            <option value="slide-bottom">{{'Slide Bottom' | trans}}</option>
                            <option value="slide-left">{{'Slide Left' | trans}}</option>
                            <option value="slide-right">{{'Slide Right' | trans}}</option>
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Media' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label">{{'Image' | trans}}</label>
                    <div class="uk-form-controls">
                        <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_width']"> {{'Width (px)' | trans}}</label>
                        <p class="uk-form-controls-condensed">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['image_height']"> {{'Height (px)' | trans}}</label>
                        </p>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Overlay' | trans}}</h3>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-overlay-background">{{'Background' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-overlay-background" class="uk-form-width-medium" ng-model="widget.data['overlay_background']">
                            <option value="none">None</option>
                            <option value="static">Static</option>
                            <option value="hover">On hover</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row" ng-if="widget.data.overlay_background != 'none'">

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="wk-overlay-background-color">{{'Background Color' | trans}}</label>
                        <div class="uk-form-controls">
                            <select id="wk-overlay-background-color" class="uk-form-width-medium" ng-model="widget.data['overlay_background_color']">
                                <option value="global">Global</option>
                                <option value="primary">Primary</option>
                                <option value="secondary">Secondary</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="wk-overlay-blend-mode">{{'Image Blend Mode' | trans}}</label>
                        <div class="uk-form-controls">
                            <select id="wk-overlay-blend-mode" class="uk-form-width-medium" ng-model="widget.data['overlay_blend_mode']">
                                <option value="">{{'Normal' | trans}}</option>
                                <option value="multiply">{{'Mulitply' | trans}}</option>
                                <option value="screen">{{'Screen' | trans}}</option>
                                <option value="overlay">{{'Overlay' | trans}}</option>
                                <option value="darken">{{'Darken' | trans}}</option>
                                <option value="lighten">{{'Lighten' | trans}}</option>
                                <option value="color-dodge">{{'Color Dodge' | trans}}</option>
                                <option value="color-burn">{{'Color Burn' | trans}}</option>
                                <option value="hard-light">{{'Hard Light' | trans}}</option>
                                <option value="soft-light">{{'Soft Light' | trans}}</option>
                                <option value="difference">{{'Difference' | trans}}</option>
                                <option value="exclusion">{{'Exclusion' | trans}}</option>
                                <option value="hue">{{'Hue' | trans}}</option>
                                <option value="saturation">{{'Saturation' | trans}}</option>
                                <option value="color">{{'Color' | trans}}</option>
                                <option value="luminosity">{{'Luminosity' | trans}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="wk-overlay-opacity">{{'Image Opacity' | trans}}</label>
                        <div class="uk-form-controls">
                            <select id="wk-overlay-opacity" class="uk-form-width-medium" ng-model="widget.data['overlay_opacity']">
                                <option value="100">{{'100%' | trans}}</option>
                                <option value="90">{{'90%' | trans}}</option>
                                <option value="80">{{'80%' | trans}}</option>
                                <option value="70">{{'70%' | trans}}</option>
                                <option value="60">{{'60%' | trans}}</option>
                                <option value="50">{{'50%' | trans}}</option>
                                <option value="40">{{'40%' | trans}}</option>
                                <option value="30">{{'30%' | trans}}</option>
                                <option value="20">{{'20%' | trans}}</option>
                                <option value="10">{{'10%' | trans}}</option>
                                <option value="0">{{'0%' | trans}}</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-overlay">{{'Content' | trans}}</label>
                    <div class="uk-form-controls">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['overlay_boxed']"> {{'Display content in an additional box styled wrapper' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['hover_overlay']"> {{'Toggle content on hover' | trans}}</label>
                        </p>

                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-overlay-position">{{'Overlay Position' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-overlay-position" class="uk-form-width-medium" ng-model="widget.data['overlay_position']">
                            <option value="top_left">Top Left</option>
                            <option value="top_center">Top Center</option>
                            <option value="top_right">Top Right</option>
                            <option value="center_left">Center Left</option>
                            <option value="center_center">Center</option>
                            <option value="center_right">Center Right</option>
                            <option value="bottom_left">Bottom Left</option>
                            <option value="bottom_center">Bottom Center</option>
                            <option value="bottom_right">Bottom Right</option>
                        </select>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-overlay-align">{{'Overlay Text Align' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-overlay-align" class="uk-form-width-medium" ng-model="widget.data['overlay_align']">
                            <option value="left">Left</option>
                            <option value="center">Center</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'Text' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['title']"> {{'Show title' | trans}}</label>
                        </p>
                        <p class="uk-form-controls-condensed">
                            <label><input type="checkbox" ng-model="widget.data['content']"> {{'Show content' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-title-size">{{'Title Size' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-title-size" class="uk-form-width-medium" ng-model="widget.data['title_size']">
                            <option value="panel">{{'Default' | trans}}</option>
                            <option value="h1">H1</option>
                            <option value="h2">H2</option>
                            <option value="h3">H3</option>
                            <option value="h4">H4</option>
                            <option value="h5">H5</option>
                            <option value="h6">H6</option>
                            <option value="large">{{'Extra Large' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Link' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link']"> {{'Show link' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-link-style">{{'Style' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-link-style" class="uk-form-width-medium" ng-model="widget.data['link_style']">
                            <option value="text">{{'Text' | trans}}</option>
                            <option value="icon">{{'Icon Mini' | trans}}</option>
                            <option value="icon-small">{{'Icon Small' | trans}}</option>
                            <option value="icon-medium">{{'Icon Medium' | trans}}</option>
                            <option value="icon-large">{{'Icon Large' | trans}}</option>
                            <option value="icon-button">{{'Icon Button' | trans}}</option>
                            <option value="button">{{'Button' | trans}}</option>
                            <option value="primary">{{'Button Primary' | trans}}</option>
                            <option value="button-large">{{'Button Large' | trans}}</option>
                            <option value="primary-large">{{'Button Large Primary' | trans}}</option>
                            <option value="button-link">{{'Button Link' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="(['icon', 'icon-small', 'icon-medium', 'icon-large', 'icon-button'].indexOf(widget.data.link_style) > -1)">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['link_icon']">
                                    <option value="arrows-alt">{{'Arrows Alt' | trans}}</option>
                                    <option value="expand">{{'Expand' | trans}}</option>
                                    <option value="image">{{'Image' | trans}}</option>
                                    <option value="hand-o-right">{{'Hand' | trans}}</option>
                                    <option value="lightbulb-o">{{'Lightbulb' | trans}}</option>
                                    <option value="eye">{{'Eye' | trans}}</option>
                                    <option value="info">{{'Info' | trans}}</option>
                                    <option value="info-circle">{{'Info Circle' | trans}}</option>
                                    <option value="play-circle">{{'Play-circle' | trans}}</option>
                                    <option value="search">{{'Search' | trans}}</option>
                                    <option value="search-plus">{{'Search Plus' | trans}}</option>
                                    <option value="external-link">{{'External Link' | trans}}</option>
                                    <option value="external-link-square">External Link Square</option>
                                    <option value="angle-right">{{'Angle' | trans}}</option>
                                    <option value="angle-double-right" class="uk-icon-expand">{{'Angle Double' | trans}}</option>
                                    <option value="arrow-right">{{'Arrow' | trans}}</option>
                                    <option value="arrow-circle-right">{{'Arrow Circle' | trans}}</option>
                                    <option value="arrow-circle-o-right">Arrow Circle Outlined</option>
                                    <option value="long-arrow-right">{{'Long Arrow' | trans}}</option>
                                    <option value="caret-right">{{'Caret' | trans}}</option>
                                    <option value="caret-square-o-right">{{'Caret Square' | trans}}</option>
                                    <option value="chevron-right">{{'Chevron' | trans}}</option>
                                    <option value="chevron-circle-right">{{'Chevron Circle' | trans}}</option>
                                    <option value="plus">{{'Plus' | trans}}</option>
                                    <option value="plus-square">{{'Plus Square' | trans}}</option>
                                    <option value="plus-square-o">{{'Plus Square Outlined' | trans}}</option>
                                    <option value="plus-circle">{{'Plus Circle' | trans}}</option>
                                    <option value="share">{{'Share' | trans}}</option>
                                    <option value="share-square">{{'Share Square' | trans}}</option>
                                    <option value="share-square-o">{{'Share Square Outlined' | trans}}</option>
                                </select>
                                {{'Icon' | trans}}
                            </label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-link-text">{{'Text' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-link-text" class="uk-form-width-medium" type="text" ng-model="widget.data['link_text']">
                    </div>
                </div>

            </li>
            <li>

            <h3 class="wk-form-heading">{{'Lightbox' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Lightbox' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['lightbox']"> {{'Enable lightbox' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label">{{'Image' | trans}}</label>
                    <div class="uk-form-controls">
                        <label><input class="uk-form-width-small" type="text" ng-model="widget.data['lightbox_width']"> {{'Width (px)' | trans}}</label>
                        <p class="uk-form-controls-condensed">
                            <label><input class="uk-form-width-small" type="text" ng-model="widget.data['lightbox_height']"> {{'Height (px)' | trans}}</label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-lightbox-caption">{{'Caption' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-lightbox-caption" class="uk-form-width-medium" ng-model="widget.data['lightbox_caption']">
                            <option value="none">{{'None' | trans}}</option>
                            <option value="title">{{'Use Title' | trans}}</option>
                            <option value="content">{{'Use Content' | trans}}</option>
                        </select>
                    </div>
                </div>

                <h3 class="wk-form-heading">{{'Button' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Display' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['lightbox_link']"> {{'Enable lightbox link' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-lightbox-style">{{'Style' | trans}}</label>
                    <div class="uk-form-controls">
                        <select id="wk-lightbox-style" class="uk-form-width-medium" ng-model="widget.data['lightbox_style']">
                            <option value="text">{{'Text' | trans}}</option>
                            <option value="icon">{{'Icon Mini' | trans}}</option>
                            <option value="icon-small">{{'Icon Small' | trans}}</option>
                            <option value="icon-medium">{{'Icon Medium' | trans}}</option>
                            <option value="icon-large">{{'Icon Large' | trans}}</option>
                            <option value="icon-button">{{'Icon Button' | trans}}</option>
                            <option value="button">{{'Button' | trans}}</option>
                            <option value="primary">{{'Button Primary' | trans}}</option>
                            <option value="button-large">{{'Button Large' | trans}}</option>
                            <option value="primary-large">{{'Button Large Primary' | trans}}</option>
                            <option value="button-link">{{'Button Link' | trans}}</option>
                        </select>
                        <p class="uk-form-controls-condensed" ng-if="(['icon', 'icon-small', 'icon-medium', 'icon-large', 'icon-button'].indexOf(widget.data.lightbox_style) > -1)">
                            <label>
                                <select class="uk-form-width-small" ng-model="widget.data['lightbox_icon']">
                                    <option value="arrows-alt">{{'Arrows Alt' | trans}}</option>
                                    <option value="expand">{{'Expand' | trans}}</option>
                                    <option value="image">{{'Image' | trans}}</option>
                                    <option value="hand-o-right">{{'Hand' | trans}}</option>
                                    <option value="lightbulb-o">{{'Lightbulb' | trans}}</option>
                                    <option value="eye">{{'Eye' | trans}}</option>
                                    <option value="info">{{'Info' | trans}}</option>
                                    <option value="info-circle">{{'Info Circle' | trans}}</option>
                                    <option value="play-circle">{{'Play-circle' | trans}}</option>
                                    <option value="search">{{'Search' | trans}}</option>
                                    <option value="search-plus">{{'Search Plus' | trans}}</option>
                                    <option value="external-link">{{'External Link' | trans}}</option>
                                    <option value="external-link-square">{{'External Link Square' | trans}}</option>
                                    <option value="angle-right">{{'Angle' | trans}}</option>
                                    <option value="angle-double-right" class="uk-icon-expand">{{'Angle Double' | trans}}</option>
                                    <option value="arrow-right">{{'Arrow' | trans}}</option>
                                    <option value="arrow-circle-right">{{'Arrow Circle' | trans}}</option>
                                    <option value="arrow-circle-o-right">Arrow Circle Outlined</option>
                                    <option value="long-arrow-right">{{'Long Arrow' | trans}}</option>
                                    <option value="caret-right">{{'Caret' | trans}}</option>
                                    <option value="caret-square-o-right">{{'Caret Square' | trans}}</option>
                                    <option value="chevron-right">{{'Chevron' | trans}}</option>
                                    <option value="chevron-circle-right">{{'Chevron Circle' | trans}}</option>
                                    <option value="plus">{{'Plus' | trans}}</option>
                                    <option value="plus-square">{{'Plus Square' | trans}}</option>
                                    <option value="plus-square-o">{{'Plus Square Outlined' | trans}}</option>
                                    <option value="plus-circle">{{'Plus Circle' | trans}}</option>
                                    <option value="share">{{'Share' | trans}}</option>
                                    <option value="share-square">{{'Share Square' | trans}}</option>
                                    <option value="share-square-o">{{'Share Square Outlined' | trans}}</option>
                                </select>
                                {{'Icon' | trans}}
                            </label>
                        </p>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-lightbox-text">{{'Text' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-lightbox-text" class="uk-form-width-medium" type="text" ng-model="widget.data['lightbox_text']">
                    </div>
                </div>

            </li>
            <li>

                <h3 class="wk-form-heading">{{'General' | trans}}</h3>

                <div class="uk-form-row">
                    <span class="uk-form-label">{{'Link Target' | trans}}</span>
                    <div class="uk-form-controls uk-form-controls-text">
                        <label><input type="checkbox" ng-model="widget.data['link_target']"> {{'Open all links in a new window' | trans}}</label>
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="wk-class">{{'HTML Class' | trans}}</label>
                    <div class="uk-form-controls">
                        <input id="wk-class" class="uk-form-width-medium" type="text" ng-model="widget.data['class']">
                    </div>
                </div>

            </li>
        </ul>

    </div>
</div>
