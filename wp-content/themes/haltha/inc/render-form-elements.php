<?php
	function render_checkboxes( array $args ){
		if( empty($args['field_key']) ){
			return;
		}
		
		if( isset($args['selected']) ){
			if ( isset( $args['selected']['label'] ) ){
				$label = $args['selected']['label'];
				unset($args['selected']);
				$args['selected'] = $label;
			}
		}
		
		
		
		$field = get_field_object( $args['field_key'] );
		$html = '';
		
		if( !empty( $args['title'] ) ){
			$html .= '<h6 class="form__row-title">'.$args['title'].'</h6>';
		}
		
		if( !empty( $field['choices'] ) ){
			$html .= '<div class="form__labels">';
			
			foreach ($field['choices'] as $key => $choice){
				$name = $field['name'];
				$checked = '';
				
				if ( isset( $args['selected'] ) && $args['selected'] === $choice ){
					$checked = 'checked';
				}
				
				$html .= '<label class="form__label">
							<input type="radio"
							       name="'.$name.'"
							       class="checkbox"
							       value="'.$key.'"
									required
									'.$checked.'>
							<span class="checkbox-custom checkbox-custom--fill">
                                <svg width="12"
                                     height="9"
                                     viewBox="0 0 12 9"
                                     fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          clip-rule="evenodd"
                                          d="M11.8047 0.195262C12.0651 0.455612 12.0651 0.877722 11.8047 1.13807L4.4714 8.47141C4.21106 8.73175 3.78894 8.73175 3.5286 8.47141L0.195262 5.13807C-0.0650874 4.87772 -0.0650874 4.45561 0.195262 4.19526C0.455612 3.93491 0.877722 3.93491 1.13807 4.19526L4 7.05719L10.8619 0.195262C11.1223 -0.0650874 11.5444 -0.0650874 11.8047 0.195262Z"
                                          fill="currentColor"/>
                                </svg>
                            </span>
							<span>'.$choice.'</span>
						</label>';
			}
			
			$html .= '</div>';
		}
		
		if( !empty( $args['error'] ) ){
			$html .= '<span class="error-message">'.$args['error'].'</span>';
		}
		
		echo $html;
	}