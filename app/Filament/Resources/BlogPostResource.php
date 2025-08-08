<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogPostResource\Pages;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogPostResource extends Resource
{
    protected static ?string $model = BlogPost::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'المقالات';
    protected static ?string $modelLabel = 'مقال';
    protected static ?string $pluralModelLabel = 'المقالات';
    protected static ?string $navigationGroup = 'المدونة'; 
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('العنوان'),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->label('الرابط'),

                Forms\Components\Textarea::make('excerpt')
                    ->label('مقتطف')
                    ->maxLength(65535),

                Forms\Components\RichEditor::make('content')
                    ->label('المحتوى')
                    ->required(),

                Forms\Components\FileUpload::make('featured_image')
                    ->label('الصورة الرئيسية')
                    ->image()
                    ->directory('posts') // مجلد الحفظ
                    ->visibility('public'),


                Forms\Components\TextInput::make('meta_title')
                    ->label('Meta Title')
                    ->maxLength(255),

                Forms\Components\Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->maxLength(65535),

                Forms\Components\Toggle::make('is_published')
                    ->label('نشر المقال')
                    ->default(false),

                Forms\Components\DateTimePicker::make('published_at')
                    ->label('تاريخ النشر'),

                Forms\Components\Select::make('blog_category_id')
                    ->label('تصنيف المقال')
                    ->relationship('blogCategory', 'name')
                    ->required(),

                Forms\Components\TagsInput::make('tags')
                    ->label('الوسوم'),

                Forms\Components\TextInput::make('reading_time')
                    ->label('مدة القراءة (دقائق)')
                    ->numeric(),

                Forms\Components\TextInput::make('views_count')
                    ->label('عدد المشاهدات')
                    ->numeric()
                    ->disabled(), // عادة لا يتم تحرير عدد المشاهدات يدوياً
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('العنوان')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('الرابط'),
                Tables\Columns\TextColumn::make('blogCategory.name')->label('التصنيف')->sortable(),
                Tables\Columns\BooleanColumn::make('is_published')
                ->label('منشور')
                ->sortable(),
                Tables\Columns\TextColumn::make('published_at')->label('تاريخ النشر')->dateTime('d-m-Y H:i'),
                Tables\Columns\TextColumn::make('views_count')->label('عدد المشاهدات')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogPosts::route('/'),
            'create' => Pages\CreateBlogPost::route('/create'),
            'edit' => Pages\EditBlogPost::route('/{record}/edit'),
        ];
    }
}
