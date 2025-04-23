<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificateResource\Pages;
use App\Models\Certificate;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;

class CertificateResource extends Resource
{
    protected static ?string $model = Certificate::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name', fn ($query) => $query->where('team_id', auth()->user()->currentTeam->id))
                    ->required(),
                Forms\Components\TextInput::make('student_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('course_date')
                    ->required(),
                Forms\Components\DatePicker::make('validity_date')
                    ->required(),
                Forms\Components\Toggle::make('is_verified')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->where('team_id', auth()->user()->currentTeam->id))
            ->columns([
                Tables\Columns\TextColumn::make('code')->searchable(),
                Tables\Columns\TextColumn::make('course.name')->sortable(),
                Tables\Columns\TextColumn::make('student_name')->searchable(),
                Tables\Columns\TextColumn::make('course_date')->date(),
                Tables\Columns\TextColumn::make('validity_date')->date(),
                Tables\Columns\BooleanColumn::make('is_verified'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificates::route('/'),
            'create' => Pages\CreateCertificate::route('/create'),
            'edit' => Pages\EditCertificate::route('/{record}/edit'),
        ];
    }
}