<?php $class = 'ng-scope'; ?>
<div class="search-section auto_search ng-scope"  ng-app="PostalCodeSearchAutoComplete">
    <div class="container">
        <div class="search-outer clearfix">
            <?php
            echo $this->Form->create('Pages', array(
                'url' => 'search/term',
                'type' => 'get', 'inputDefaults' => array('div' => false, 'label' => false)));
            ?>
                        <div class="search-icon">
                            <input type="image" name="btn" src="<?php echo $this->webroot; ?>img/search-icon.png" alt=" ">
                        </div>
            <script type="text/ng-template" id="customTemplate.html">
                <a href="<?php if (!$class) { ?><?php echo Router::url('/', true) . 'search/'; ?>{{match.model.id != 'custom' ? match.model.id : 'term'}}<?php } ?>?{{match.model.id == 'custom' ? 'keywords' : 'city'}}={{match.model.id == 'custom' ? match.model.keywords : match.model.city}}">
                {{match.model.id == "custom" ? match.model.name : ""}}
                <span bind-html-unsafe="match.label | typeaheadHighlight:{{match.model.id == 'custom' ? '' : 'query'}}"></span>
                {{match.model.id == "custom" ? '' : "-"}} <span>{{match.model.city}}</span>
                {{match.model.id == "custom" ? '' : ","}} <span>{{match.model.state}}</span>
                </a>

            </script>
            <div class="search-input" ng-controller="autocompleteController">

                <input type="text" name="keywords"  
                       ng-model="selectedCountries"
                       placeholder="SEARCH BY NAME, KEYWORD or ZIP CODE" 
                       typeahead="c as c.postal  for c in cities($viewValue) | filter:$viewValue:startsWith | limitTo:10" typeahead-min-length='3' typeahead-on-select='onSelectPart($item, $model, $label)' typeahead-template-url="customTemplate.html" class="form-control" autocomplete="off">

            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

