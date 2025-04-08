<?php ob_start();?>#furigana-tools {
    padding: 0px 0px 20px 0px;
    text-align: right;
}

#furigana-tools button {
  font-size: 90%;
  color: #FFF;
  border: 1px solid #4D5196;
  background: #4D6FBE;
  padding: 0.4em 0.6em;
  border-radius: 3px;
  cursor: pointer;
}



/* ===== theme style ===== */
@media (min-width: 992px) {
  .-hasRuby #navbarColor01 .navbar-nav {
    align-items: baseline;
  }
  .-hasRuby #footer .list-unstyled {
    display: flex;
    align-items: baseline;
    flex-wrap: wrap;
  }
  .-hasRuby #footer .list-unstyled li {
    float: none !important;
  }
  .-hasRuby #footer .list-unstyled li.float-lg-right {
    position: absolute;
    right: 0px;
    top: -3em;
  }
}
.-hasRuby .breadcrumb {
  align-items: baseline;
}
@media (max-width: 991px) {
  .-hasRuby #footer .list-unstyled {
    display: flex;
    align-items: baseline;
    flex-wrap: wrap;
  }
  .-hasRuby #footer .list-unstyled li {
    float: none;
  }
  .-hasRuby #footer .list-unstyled li.float-lg-right {
    position: absolute;
    right: 0px;
    top: -3em;
  }
}
.-hasRuby .black .nav-item.active a * {
  color: #fff !important;
  font-weight: inherit !important;
}
.black .nav-item.active a ruby rt {
  font-weight: normal !important;
}
h1 .tsutaeruRuby,
h2 .tsutaeruRuby,
h3 .tsutaeruRuby,
h4 .tsutaeruRuby,
h5 .tsutaeruRuby,
h6 .tsutaeruRuby,
strong .tsutaeruRuby,
h1 .tsutaeruRuby *,
h2 .tsutaeruRuby *,
h3 .tsutaeruRuby *,
h4 .tsutaeruRuby *,
h5 .tsutaeruRuby *,
h6 .tsutaeruRuby *,
strong .tsutaeruRuby * {
  font-weight: inherit;
}
h1 .tsutaeruRuby ruby rt,
h2 .tsutaeruRuby ruby rt,
h3 .tsutaeruRuby ruby rt,
h4 .tsutaeruRuby ruby rt,
h5 .tsutaeruRuby ruby rt,
h6 .tsutaeruRuby ruby rt,
strong .tsutaeruRuby ruby rt {
  font-weight: normal !important;
}
.-hasRuby .custom-control-indicator {
  top: 50%;
  transform: translateY(-50%);
}
.-hasRuby button .tsutaeruRuby__translation {
  padding-top: 0.5em;
  display: inline-block !important;
}


/* ===== theme unique ===== */
.-hasRuby .search-box button {
    height: auto;
}

.-hasRuby .search-box button * {
    padding: 0px;
    line-height: 1;
}
.-hasRuby .item-subtitle .badges {
  display: flex;
  justify-content: flex-end;
  flex-wrap: wrap;
}
.-hasRuby .item-subtitle .badges .badge.badge-info {
  min-height: 2.8rem;
  display: flex;
  align-items: center;
  justify-content: center
}

.section-head .section-info {
  display: flex;
  justify-content: flex-end;
  flex-wrap: wrap;
}
.section-head .section-info .category {
  display: flex;
  justify-content: flex-end;
  flex-wrap: wrap;
}
.section-head .section-info .category .badge.badge-info {
  display: flex;
  align-items: center;
  justify-content: center
}
.-hasRuby .section-head .section-info .category .badge.badge-info {
  min-height: 2.8rem;
}<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>