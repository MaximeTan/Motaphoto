<div class="galerie__filters">
    <div class="categories-formats">
        <div class="categories-filter">
            <select id="categories" class="selector" data-minimum-results-for-search="-1">
                <option value="all" selected>CATÉGORIES</option>
                <?php
                $categories = get_terms(array(
                    "taxonomy" => "categorie",
                    "hide_empty" => false,
                ));
                foreach ($categories as $categorie) {
                    echo '<option value="' . $categorie->slug . '">' . mb_convert_case($categorie->name, MB_CASE_TITLE, "UTF-8") . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="formats-filter">
            <select id="formats" class="selector" data-minimum-results-for-search="-1">
                <option value="all" selected>FORMATS</option>
                <?php
                $formats = get_terms(array(
                    "taxonomy" => "format",
                    "hide_empty" => false,
                ));
                foreach ($formats as $format) {
                    echo '<option value="' . $format->slug . '">' . mb_convert_case($format->name, MB_CASE_TITLE, "UTF-8") . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="sort-date">
        <select id="sort-by-date" class="selector" data-minimum-results-for-search="-1">
            <option value="all" selected>TRIER PAR</option>
            <option value="DESC">Les Plus Récentes</option>
            <option value="ASC">Les Plus Anciennes</option>
        </select>
    </div>
</div>