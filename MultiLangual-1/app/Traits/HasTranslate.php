<?php 

namespace App\Traits;

trait HasTranslate{
 public function getTrans($attribute, $lang=null){
  $locale = $lang ?? app()->getLocale();
  $field = $attribute."_".$locale;
  return $this->attributes[$field] ?? $this->attributes[$attribute."_".config("app.locale")] ?? null;
 }
}