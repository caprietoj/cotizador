<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'name',
        'email',
        'document',
        'phone',
        'company',
        'website_type',
        'pages',
        'has_domain',
        'needs_cms',
        'needs_hosting',
        'seo_level',
        'social_integration',
        'google_analytics',
        'backup_system',
        'ssl_certificate',
        'maintenance',
        'multilanguage',
        'total_price',
        'additional_notes'
    ];

    protected $casts = [
        'has_domain' => 'boolean',
        'needs_cms' => 'boolean',
        'needs_hosting' => 'boolean',
        'social_integration' => 'boolean',
        'google_analytics' => 'boolean',
        'backup_system' => 'boolean',
        'ssl_certificate' => 'boolean',
        'maintenance' => 'boolean',
        'multilanguage' => 'boolean',
        'total_price' => 'decimal:2'
    ];

    public static function calculatePrice($data)
    {
        $basePrice = 0;
        
        // Precios base por tipo de sitio web (en pesos colombianos)
        $basePrices = [
            'landing' => 800000,
            'corporate' => 1500000,
            'ecommerce' => 3500000,
            'blog' => 1200000,
            'portfolio' => 1000000,
            'custom' => 2000000
        ];
        
        $basePrice = $basePrices[$data['website_type']] ?? 0;
        
        // Precio por páginas adicionales (excepto landing page)
        if ($data['website_type'] !== 'landing' && $data['pages'] > 1) {
            $additionalPages = $data['pages'] - 1;
            $basePrice += $additionalPages * 150000;
        }
        
        // Servicios adicionales
        if ($data['needs_cms']) $basePrice += 500000;
        if ($data['needs_hosting']) $basePrice += 200000;
        
        // SEO
        if ($data['seo_level'] === 'basic') $basePrice += 300000;
        if ($data['seo_level'] === 'advanced') $basePrice += 800000;
        
        // Integraciones y servicios
        if ($data['social_integration']) $basePrice += 200000;
        if ($data['google_analytics']) $basePrice += 150000;
        if ($data['backup_system']) $basePrice += 250000;
        if ($data['ssl_certificate']) $basePrice += 100000;
        if ($data['maintenance']) $basePrice += 400000;
        if ($data['multilanguage']) $basePrice += 600000;
        
        return $basePrice;
    }

    public function getWebsiteTypeNameAttribute()
    {
        $types = [
            'landing' => 'Landing Page',
            'corporate' => 'Sitio Corporativo',
            'ecommerce' => 'Tienda Online',
            'blog' => 'Blog/Revista',
            'portfolio' => 'Portafolio',
            'custom' => 'Personalizado'
        ];
        
        return $types[$this->website_type] ?? 'Desconocido';
    }

    public function getSeoLevelNameAttribute()
    {
        $levels = [
            'none' => 'Sin SEO',
            'basic' => 'SEO Básico',
            'advanced' => 'SEO Avanzado'
        ];
        
        return $levels[$this->seo_level] ?? 'Sin SEO';
    }
}
